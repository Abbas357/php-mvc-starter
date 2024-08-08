<?php

namespace App\Controllers;

use PDO;

abstract class Controller
{
    protected function DataTable($table, $searchColumns, $recordFormatter)
    {
        $draw = request()->query('draw') ?? 1;
        $start = request()->query('start') ?? 0;
        $rowperpage = request()->query('length') ?? 10;

        $order = request()->query('order');
        $columns = request()->query('columns');
        $search = request()->query('search');

        // Initialize default values in case of missing or malformed data
        $columnIndex = 0;
        $columnName = $searchColumns[0];
        $columnSortOrder = 'asc';
        $searchValue = '';

        // Extract column index and sort order if order array is present
        if (isset($order[0]['column'])) {
            $columnIndex = $order[0]['column'];
        }
        if (isset($order[0]['dir'])) {
            $columnSortOrder = $order[0]['dir'];
        }

        // Extract column name if columns array is present and valid
        if (isset($columns[$columnIndex]['data'])) {
            if (is_array($columns[$columnIndex]['data']) && isset($columns[$columnIndex]['data']['sort'])) {
                $columnName = $columns[$columnIndex]['data']['sort'];
            } else {
                error_log("Error: Column data is not properly formatted as an array or 'sort' key is missing.");
            }
        } else {
            error_log("Error: Column index $columnIndex does not exist in columns array.");
        }

        // Extract search value if present
        if (isset($search['value'])) {
            $searchValue = $search['value'];
        }

        // Database connection
        $pdo = pdo();

        // Total records without filtering
        $stmt = $pdo->prepare("SELECT COUNT(*) as count FROM $table");
        $stmt->execute();
        $totalRecords = $stmt->fetch(PDO::FETCH_OBJ)->count;

        // Base query
        $baseQuery = "SELECT * FROM $table";
        $params = [];

        // Apply global search filter if necessary
        $globalSearchQuery = [];
        if (!empty($searchValue)) {
            foreach ($searchColumns as $column) {
                $globalSearchQuery[] = "$column LIKE :searchValue";
            }
            $params[':searchValue'] = '%' . $searchValue . '%';
        }

        // Apply individual column filters if present
        $columnSearchQuery = [];
        foreach ($columns as $index => $column) {
            if (isset($column['search']['value']) && !empty($column['search']['value'])) {
                $filterValue = $column['search']['value'];
                $filterOperator = request()->query("filterOperator$index") ?? 'contain';

                switch ($filterOperator) {
                    case 'contain':
                        $columnSearchQuery[] = "{$column['data']} LIKE :filterValue$index";
                        $params[":filterValue$index"] = '%' . $filterValue . '%';
                        break;
                    case 'notcontain':
                        $columnSearchQuery[] = "{$column['data']} NOT LIKE :filterValue$index";
                        $params[":filterValue$index"] = '%' . $filterValue . '%';
                        break;
                    case 'equal':
                        $columnSearchQuery[] = "{$column['data']} = :filterValue$index";
                        $params[":filterValue$index"] = $filterValue;
                        break;
                    case 'notequal':
                        $columnSearchQuery[] = "{$column['data']} != :filterValue$index";
                        $params[":filterValue$index"] = $filterValue;
                        break;
                    case 'beginwith':
                        $columnSearchQuery[] = "{$column['data']} LIKE :filterValue$index";
                        $params[":filterValue$index"] = $filterValue . '%';
                        break;
                    case 'endwith':
                        $columnSearchQuery[] = "{$column['data']} LIKE :filterValue$index";
                        $params[":filterValue$index"] = '%' . $filterValue;
                        break;
                    case 'greaterthan':
                        $columnSearchQuery[] = "{$column['data']} > :filterValue$index";
                        $params[":filterValue$index"] = $filterValue;
                        break;
                    case 'lessthan':
                        $columnSearchQuery[] = "{$column['data']} < :filterValue$index";
                        $params[":filterValue$index"] = $filterValue;
                        break;
                }
            }
        }

        // Combine global and column-specific filters
        $whereClauses = [];
        if (!empty($globalSearchQuery)) {
            $whereClauses[] = '(' . implode(' OR ', $globalSearchQuery) . ')';
        }
        if (!empty($columnSearchQuery)) {
            $whereClauses[] = implode(' AND ', $columnSearchQuery);
        }
        if (!empty($whereClauses)) {
            $baseQuery .= ' WHERE ' . implode(' AND ', $whereClauses);
        }

        // Total records with filtering
        $stmt = $pdo->prepare($baseQuery);
        $stmt->execute($params);
        $totalRecordswithFilter = $stmt->rowCount();

        // Apply ordering and pagination
        $baseQuery .= " ORDER BY $columnName $columnSortOrder LIMIT :start, :rowperpage";
        $params[':start'] = (int) $start;
        $params[':rowperpage'] = (int) $rowperpage;

        // Fetch records
        $stmt = $pdo->prepare($baseQuery);
        foreach ($params as $param => $value) {
            $stmt->bindValue($param, $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
        }
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_OBJ);

        // Format the records
        $formattedRecords = array_map($recordFormatter, $records);

        // Prepare response
        $response = [
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $formattedRecords,
        ];

        // Return JSON response
        return response()->json($response);
    }
}
