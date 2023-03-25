# Laravel Note #

## Route ## 
1. Có thể định nghĩa route với regex một cách global

   
   vd: id bắt buộc là số
   ```
    App\Providers\RouteServiceProvider
    vào hàm boot:
    Route::pattern('id', '[0-9]+');
   ```
2. Route có thể return trực tiếp ra view với
   ```
    Route::view("ten view");
   ```
3. Bắt Route mà không có ăn với url nào 
    ```
    Route::fallback();
    ```
4. CSRF
    ```
    @csrf 
    ```
   Giải thích
   Cái này sẽ generate ra một token và trong http/Kernel cũng có
   ```
     \App\Http\Middleware\VerifyCsrfToken::class
    ```
    Nếu 2 cái này match với nhau thì Laravel mới cho đi tiếp