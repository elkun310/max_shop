<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//FrontEnd
//index
Route::get('','frontend\IndexController@getIndex');
Route::get('about','frontend\IndexController@getAbout');
Route::get('contact','frontend\IndexController@getContact');
// Route::get('search','frontend\IndexController@searchProduct');
Route::post('signup','frontend\IndexController@signUp');
Route::post('signin','frontend\IndexController@signIn');
Route::get('/logout','frontend\IndexController@logOut');
//user<customer>
Route::group(['prefix' => 'account','middleware'=>'CheckAccount'], function () {
    Route::get('info/{idAccount}','frontend\AccountController@detailAccount');
    Route::post('info/{idAccount}','frontend\AccountController@editAccount');
});
//product
Route::group(['prefix' => 'product'], function () {
    Route::get('detail/{str}.html','frontend\ProductController@getDetail');
    Route::post('detail/{str}.html','frontend\ProductController@postComment');
    Route::get('','frontend\ProductController@getShop');
    // Route::get('content','frontend\ProductController@contentLoad');
    Route::get('{slug_cate}.html','frontend\ProductController@Getprdcate')->name('slugcate');
    Route::get('search','frontend\ProductController@searchAjaxProduct');
    //Route::get('cart/detail/{str}.html','frontend\ProductController@GetCartDetail');
});
//checkout
Route::group(['prefix' => 'checkout'], function () {
    Route::get('','frontend\CheckoutController@getCheckout');
    Route::post('','frontend\CheckoutController@postCheckout');
    Route::get('complete/{customer_id}','frontend\CheckoutController@getComplete');
});
//cart
Route::group(['prefix' => 'cart'], function () {
    Route::get('','frontend\CartController@getCart');
    Route::get('add','frontend\CartController@addCart');
    Route::get('remove/{rowId}','frontend\CartController@removeCart');
    Route::get('update/{rowId}/{qty}','frontend\CartController@updateCart');
});
Route::post('subcribe', 'frontend\IndexController@subcribe');


//ADMIN
Route::get('login', 'backend\LoginController@getLogin')->middleware('CheckLogout');
Route::post('login','backend\LoginController@postLogin');
Route::group(['prefix' => 'admin','middleware'=>'CheckLogin','namespace'=>'backend'], function () {
    Route::get('','IndexController@getIndex');
    Route::get('logout','IndexController@LogOut');
    //user
    Route::group(['prefix' => 'user','middleware'=>'CheckUser'], function () {
        Route::get('','UserController@getListUser');
        Route::get('add','UserController@getAddUser');
        Route::post('add','UserController@postAddUser');
        Route::get('edit/{idUser}','UserController@getEditUser');
        Route::post('edit/{idUser}','UserController@postEditUser');
        Route::get('del-user/{idUser}','UserController@DeleteUser');
        // Route::post('del-multi','userController@Delmulti');
    });
    //customer
    Route::group(['prefix' => 'customer'], function () {
        Route::get('','CustomerController@getListCustomer');
    });
    //category
    Route::group(['prefix' => 'category'], function () {
        Route::get('','CategoryController@getCategory');
        Route::post('','CategoryController@postCategory');
        Route::get('edit/{idCategory}','CategoryController@getEditCategory');
        Route::post('edit/{idCategory}','CategoryController@postEditCategory');
        Route::get('del/{idCategory}','CategoryController@DeleteCategory');
        
    });
    
    //product
    Route::group(['prefix' => 'product'], function () {
        Route::get('','ProductController@getListProduct');
        Route::get('add','ProductController@getAddProduct');
        Route::post('add', 'ProductController@postAddProduct');
        Route::get('edit/{idProduct}','ProductController@getEditProduct');
        Route::post('edit/{idProduct}','ProductController@postEditProduct');
        Route::get('del-product/{idProduct}', 'ProductController@deleteProduct');
        Route::post('ajax-show-product', 'AjaxController@showProduct');
        Route::post('ajax-display','AjaxController@changeDisplay');
        Route::get('search', 'ProductController@searchProduct')->name('search');

        // attr :thuộc tính
        Route::post('add-attr','ProductController@addAttr');
        Route::get('detail-attr','ProductController@detailAttr');
        Route::get('edit-attr/{idAttr}','ProductController@editAttr');
        Route::post('edit-attr/{idAttr}','ProductController@postEditAttr');
        Route::get('del-attr/{idAttr}','ProductController@deleteAttr');

        //value: giá trị của thuộc tính
        Route::post('add-value','ProductController@addValue');
        Route::get('edit-value/{idValue}','ProductController@editValue');
        Route::post('edit-value/{idValue}','ProductController@postEditValue');
        Route::get('del-value/{idValue}','ProductController@deleteValue');

        //vartiant:
        Route::get('add-variant/{idProduct}','ProductController@addVariant');
        Route::post('add-variant/{idProduct}','ProductController@postAddVariant');
        Route::get('edit-variant/{idProduct}','ProductController@editVariant');
        Route::post('edit-variant/{idProduct}','ProductController@postEditVariant');
        Route::get('del-variant/{idVariant}','ProductController@deleteVariant');


        
    });
    Route::group(['prefix' => 'comment'], function () {
        //comment
        Route::get('/active','ProductController@getListActiveComment');
        Route::get('','ProductController@getListComment');
        Route::post('delmulti','ProductController@getDeleteMulti');
        Route::get('edit/{idComment}','ProductController@getEditComment');
        Route::post('edit/{idComment}','ProductController@postEditComment');
        Route::get('confirm/{idComment}','ProductController@confirmComment');
        Route::get('delete/{idComment}','ProductController@deleteComment');
    });
    //order
    Route::group(['prefix' => 'order'], function () {
        Route::get('','OrderController@getOrder');
        Route::get('detail/{idCustomer}','OrderController@getDetailOrder');
        Route::get('processed','OrderController@getProcessed');
        Route::get('processing/{idCustomer}','OrderController@Processing');
        Route::get('print/{idCustomer}','OrderController@printOrder');
        Route::get('export-excel','OrderController@exportExcel');
        Route::get('export-pdf','orderController@pdf');
        Route::get('delete/{idCustomer}','OrderController@deleteOrder');
        Route::get('cancel','OrderController@cancelOrder');
        Route::get('sortdate','OrderController@sortDate');
        Route::get('sortprocessed','OrderController@sortProcessedByDate');
    });

    //report
    Route::group(['prefix' => 'report','middleware'=>'CheckUser'], function () {
        Route::get('', 'ReportController@getReport');
        Route::get('sort-report','ReportController@sortByMonth');
        Route::get('paginate','ReportController@paginate');
    });
    

});

//test pusher
Route::get('getPusher', function (){
    return view('form_pusher');
 });
 
Route::get('/pusher', function(Illuminate\Http\Request $request) {
     event(new App\Events\HelloPusherEvent($request));
     return redirect('getPusher');
 });