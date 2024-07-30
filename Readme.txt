1. New Tables
    A. users
    B. roles
    C. permissions
    D. user_roles
    E. role_permissions

Implement Roles and permissions

    Step #1:  Assign Roles to Users

        $userId = 1; // Example user ID
        $roleId = 2; // Example role ID

        $sql = "INSERT INTO user_roles (user_id, role_id) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$userId, $roleId]);

    Step #2: Assign Permissions to Roles

        $roleId = 2; // Example role ID
        $permissionId = 3; // Example permission ID

        $sql = "INSERT INTO role_permissions (role_id, permission_id) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$roleId, $permissionId]);

    Step #3: Check User Permissions

        $userId = 1; // Example user ID
        $requiredPermission = 'edit_posts'; // Example permission

        // Get user's roles
        $sql = "SELECT r.id FROM roles r
                JOIN user_roles ur ON r.id = ur.role_id
                WHERE ur.user_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$userId]);
        $roles = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);

        // Get permissions for those roles
        $sql = "SELECT p.permission_name FROM permissions p
                JOIN role_permissions rp ON p.id = rp.permission_id
                WHERE rp.role_id IN (" . implode(',', array_fill(0, count($roles), '?')) . ")";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($roles);
        $permissions = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);

        // Check if the required permission is in the list
        if (in_array($requiredPermission, $permissions)) {
            echo "User has the required permission.";
        } else {
            echo "User does not have the required permission.";
        }
