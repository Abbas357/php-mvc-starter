$(function() {
    class REQUEST {
        constructor(baseURL) {
            this.baseURL = baseURL || '';
        }

        request(method, url, data = {}, success, error) {
            $.ajax({
                url: this.baseURL + url,
                type: method,
                data: method !== 'GET' ? JSON.stringify(data) : undefined,
                contentType: method !== 'GET' ? 'application/json' : undefined,
                dataType: 'json',
                success: success,
                error: (xhr, status, err) => {
                    console.error(`${method} request to ${url} failed:`, err);
                    if (error) error(err);
                }
            });
        }

        GET(url, success, error) {
            this.request('GET', url, {}, success, error);
        }
        POST(url, data, success, error) {
            this.request('POST', url, data, success, error);
        }
        PATCH(url, data, success, error) {
            this.request('PATCH', url, data, success, error);
        }
        DELETE(url, data, success, error) {
            this.request('DELETE', url, data, success, error);
        }
        AJAX() {

            $('.account-logout').click(() => {
                this.POST(
                    'ajax/logout.php',
                    {},
                    () => { window.location.href = 'login'; },
                    (error) => { console.error('Logout failed:', error); }
                );
            });

            $('#fetch-user-data').click(() => {
                this.GET(
                    'ajax/fetchUserData.php',
                    (response) => { console.log('User data:', response); },
                    (error) => { console.error('Failed to fetch user data:', error); }
                );
            });
            
        }
    }

    new REQUEST('').AJAX();
});
