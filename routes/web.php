<?php

use Illuminate\Support\Facades\Route;
use App\Order;
use App\Product;
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
Route::get('/', function () {
    $payment = DB::select('select * from payments');
    $topics = DB::select('select * from topic_homepage');
    $work = DB::select('select * from workings');
    $store = DB::select('select * from store');
    $order = DB::select('select * from orders');
    $categories0 = DB::select('select * from categories where type = 0');
    $categories1 = DB::select('select * from categories where type = 1');
    return view('homenew',['topic_homepage' => $topics,'workings' => $work,'store' => $store,'category0' => $categories0,'category1' => $categories1,'orders' => $order,'payment' => $payment]);
});

Route::get('/home', function () {
    $payment = DB::select('select * from payments');
    $order = DB::select('select * from orders');
    $topics = DB::select('select * from topic_homepage');
    $work = DB::select('select * from workings');
    $store = DB::select('select * from store');
    $categories0 = DB::select('select * from categories where type = 0');
    $categories1 = DB::select('select * from categories where type = 1');
    return view('homenew',['topic_homepage' => $topics,'workings' => $work,'store' => $store,'category0' => $categories0,'category1' => $categories1,'orders' => $order,'payment' => $payment]);
});

Route::get('/contact', function (){
    return view('contact');
});
Route::get('/admin/dashboard', function () {
    return view('Dashboard');
});

Route::get('/complete', function () {
    $userID = Auth::user()->id;
    $payment = DB::select('select * from payments');
    $order = DB::select('select * from orders');
    $category = DB::select('select * from categories');
    $categories0 = DB::select('select * from categories where type = 0');
    $categories1 = DB::select('select * from categories where type = 1');
    $product = DB::select('select * from products');
    return view('complete',['category0' => $categories0,'category1' => $categories1,'orders' => $order,'payment' => $payment,'category' => $category,'products' => $product,'userID' => $userID]);
});

Route::get('/dashboard/products/show/{id}',function($id){
    $product = DB::select('select * from products where id = ?',[$id]);
    return view('product.ShowDetail',['products' => $product]);
});
Route::get('/works/show/{id}',function($id){
    $work = DB::select('select * from workings where id = ?',[$id]);
    $payment = DB::select('select * from payments');
    $order = DB::select('select * from orders');
    $caticon = DB::select('select * from caticons where id = ?',[$id]);
    $category = DB::select('select * from categories where id = ?',[$id]);
    $categories0 = DB::select('select * from categories where type = 0');
    $categories1 = DB::select('select * from categories where type = 1');
    $product = Product::paginate(6);
    return view('showWorks',['caticons' => $caticon,'category0' => $categories0,'category1' => $categories1,'category' => $category,'products' => $product,'orders' => $order,'payment' => $payment,'workings' => $work]);
});
Route::get('/category/show/{id}',function($id){
    $payment = DB::select('select * from payments');
    $order = DB::select('select * from orders');
    $caticon = DB::select('select * from caticons ');
    $category = DB::select('select * from categories where id = ?',[$id]);
    $categories0 = DB::select('select * from categories where type = 0');
    $categories1 = DB::select('select * from categories where type = 1');
    $product = Product::paginate(10);
    return view('category.FrontShow',['caticons' => $caticon,'category0' => $categories0,'category1' => $categories1,'category' => $category,'products' => $product,'orders' => $order,'payment' => $payment]);
});
Route::get('/product/show/{id}',function($id){
    $promotion = DB::select('select * from promotion');
    $payment = DB::select('select * from payments');
    $order = DB::select('select * from orders');
    $orderdetail = DB::select('select * from orderdetails ');
    $caticon = DB::select('select * from caticons where id = ?',[$id]);
    $category = DB::select('select * from categories where id = ?',[$id]);
    $categories0 = DB::select('select * from categories where type = 0');
    $categories1 = DB::select('select * from categories where type = 1');
    $product = DB::select('select * from products where id = ?',[$id]);
    return view('product.FrontShow',['caticons' => $caticon,'category0' => $categories0,'category1' => $categories1,'category' => $category,'products' => $product,'orders' => $order,'orderdetails' => $orderdetail,'payment' => $payment,'promotion' => $promotion]);
});
Route::get('/cart',function(){
    $payment = DB::select('select * from payments');
    $userID = Auth::user()->id;
    $order = DB::select('select * from orders');
    $orderdetail = DB::select('select * from orderdetails ');
    $category = DB::select('select * from categories');
    $categories0 = DB::select('select * from categories where type = 0');
    $categories1 = DB::select('select * from categories where type = 1');
    $product = DB::select('select * from products');
    return view('layouts.cart',['category0' => $categories0,'category1' => $categories1,'category' => $category,'products' => $product,'orders' => $order,'orderdetails' => $orderdetail,'userID' => $userID,'payment' => $payment]);
});
Route::get('/cart/delete/{orderdetailID}/{orderID}','OrdersSetController@delete');
Route::get('/order','OrdersSetController@order');
Route::post('/SendToCart','OrdersSetController@store');
Route::post('/SendToCart/Complete','OrdersSetController@storeComplete');
Route::get('/cart/edit/{id}',function($id){
    $payment = DB::select('select * from payments');
    $userID = Auth::user()->id;
    $order = DB::select('select * from orders');
    $orderdetail = DB::select('select * from orderdetails where id = ?',[$id]);
    $category = DB::select('select * from categories');
    $categories0 = DB::select('select * from categories where type = 0');
    $categories1 = DB::select('select * from categories where type = 1');
    $product = DB::select('select * from products');
    return view('layouts.editCart',['category0' => $categories0,'category1' => $categories1,'category' => $category,'products' => $product,'orders' => $order,'orderdetails' => $orderdetail,'userID' => $userID,'payment' => $payment]);
});
Route::post('/quantity/update/{id}','OrdersSetController@QuantityUpdate');
Route::post('/CartToCash','OrdersSetController@Check');
Route::post('/promotion/code','PromotionController@Check');
Route::get('/cash', function () {
    $payment = DB::select('select * from payments');
    $store = DB::select('select * from store');
    $promotion = DB::select('select * from promotion');
    $userID = Auth::user()->id;
    $user = DB::select('select * from users');
    $order = DB::select('select * from orders');
    $orderdetail = DB::select('select * from orderdetails ');
    $category = DB::select('select * from categories ');
    $categories0 = DB::select('select * from categories where type = 0');
    $categories1 = DB::select('select * from categories where type = 1');
    $product = DB::select('select * from products');
    return view('layouts.cash',['category0' => $categories0,'category1' => $categories1,'category' => $category,'products' => $product,'orders' => $order,'users' => $user,'userID' => $userID,'orderdetails' => $orderdetail,'store' => $store,'promotion' => $promotion,'payment' => $payment]);
});
Route::post('/CashToStatus','PaymentController@store');
Route::get('/status/order/{id}', function ($id) {
    $reject = DB::select('select * from reject');
    $payment = DB::select('select * from payments');
    $status = DB::select('select * from status');
    $store = DB::select('select * from store');
    $promotion = DB::select('select * from promotion');
    $userID = Auth::user()->id;
    $order = DB::select('select * from orders where id = ?',[$id]);
    $orderdetail = DB::select('select * from orderdetails ');
    $category = DB::select('select * from categories ');
    $categories0 = DB::select('select * from categories where type = 0');
    $categories1 = DB::select('select * from categories where type = 1');
    $product = DB::select('select * from products');
    return view('layouts.status',['category0' => $categories0,'category1' => $categories1,'category' => $category,'products' => $product,'orders' => $order,'userID' => $userID,'orderdetails' => $orderdetail,'store' => $store,'promotion' => $promotion,'status' => $status,'payment' => $payment,'reject' => $reject]);
});
Route::post('/review/store','ReviewController@store');
Route::get('/review/order/{id}', function ($id) {
    $user = DB::select('select * from users');
    $review = DB::select('select * from review');
    $reject = DB::select('select * from reject');
    $payment = DB::select('select * from payments');
    $status = DB::select('select * from status');
    $store = DB::select('select * from store');
    $promotion = DB::select('select * from promotion');
    $userID = Auth::user()->id;
    $order = DB::select('select * from orders where id = ?',[$id]);
    $orderdetail = DB::select('select * from orderdetails ');
    $category = DB::select('select * from categories ');
    $categories0 = DB::select('select * from categories where type = 0');
    $categories1 = DB::select('select * from categories where type = 1');
    $product = DB::select('select * from products');
    return view('layouts.review',['category0' => $categories0,'category1' => $categories1,'category' => $category,'products' => $product,'orders' => $order,'userID' => $userID,'orderdetails' => $orderdetail,'store' => $store,'promotion' => $promotion,'status' => $status,'payment' => $payment,'reject' => $reject,'users' => $user,'review' => $review]);
});
Route::get('/Address/edit', function () {
    $payment = DB::select('select * from payments');
    $store = DB::select('select * from store');
    $userID = Auth::user()->id;
    $user = DB::select('select * from users');
    $order = DB::select('select * from orders');
    $orderdetail = DB::select('select * from orderdetails ');
    $category = DB::select('select * from categories ');
    $categories0 = DB::select('select * from categories where type = 0');
    $categories1 = DB::select('select * from categories where type = 1');
    $product = DB::select('select * from products');
    return view('address.edit',['category0' => $categories0,'category1' => $categories1,'category' => $category,'products' => $product,'orders' => $order,'users' => $user,'userID' => $userID,'orderdetails' => $orderdetail,'store' => $store,'payment' => $payment]);
});

Route::post('/Address/update/{id}','PaymentController@AddressUpdate');
Route::get('/order/list', function () {
    $status = DB::select('select * from status');
    $payment = DB::select('select * from payments');
    $user = DB::select('select * from users');
    $userID = Auth::user()->id;
    $order = DB::select('select * from orders');
    $orderdetail = DB::select('select * from orderdetails ');
    $category = DB::select('select * from categories');
    $categories0 = DB::select('select * from categories where type = 0');
    $categories1 = DB::select('select * from categories where type = 1');
    $product = DB::select('select * from products');
    return view('layouts.list',['category0' => $categories0,'category1' => $categories1,'category' => $category,'products' => $product,'orders' => $order,'orderdetails' => $orderdetail,'userID' => $userID,'payment' => $payment,'status' => $status,'users' => $user]);
});

Route::get('/home/user', 'HomeController@index')->name('home');

Route::get('/order/{id}',function ($id){
    
    $order = Order::find($id);
    return $order->products()->orderBy('name','asc')->get();
    
});
Route::get('/order/product/{id}',function ($id){
    
    $order = Product::find($id);
    return $order->orders()->orderBy('created_at','desc')->get();
    
});
Route::group(['middleware' => 'admin'],function(){
    Route::resource('/dashboard/dashboard','ProductController');
    Route::resource('/dashboard/users','UserController');
    Route::resource('/dashboard/products','ProductController');
    Route::resource('/dashboard/store','StoreController');
    Route::get('/dashboard/categories','CategoriesController@home');
    Route::get('/dashboard/categories/show/{id}','CategoriesController@show');
    Route::get('/dashboard/categories/new/', 'CategoriesController@new');
    Route::post('/dashboard/categories/store/','CategoriesController@store');
    Route::get('/dashboard/categories/edit/{id}','CategoriesController@edit');
    Route::post('/dashboard/categories/update/{id}','CategoriesController@update');
    Route::get('/dashboard/categories/delete/{id}','CategoriesController@delete');
});

Auth::routes();

Route::get('/dashboard/admin/order', function () {
    $user = DB::select('select * from users');
    $status = DB::select('select * from status');
    $order = DB::select('select * from orders');
    return view('dashboard.show',['orders' => $order,'users' => $user,'status' => $status]);
});
Route::get('/dashboard/admin/order/delete/{id}','OrdersSetController@deleteOrder');
Route::get('/dashboard/admin/order/edit/{id}',function($id){
    $payment = DB::select('select * from payments');
    $userID = Auth::user()->id;
    $order = DB::select('select * from orders');
    $orderdetail = DB::select('select * from orderdetails where id = ?',[$id]);
    $status = DB::select('select * from status');
    $user = DB::select('select * from users');
    $product = DB::select('select * from products');
    $promotion = DB::select('select * from promotion');
    return view('dashboard.editOrder',['status' => $status,'users' => $user,'promotion' => $promotion,'products' => $product,'orders' => $order,'orderdetails' => $orderdetail,'userID' => $userID,'payment' => $payment]);
});
Route::post('/dashboard/admin/order/update/{id}','OrdersSetController@OrderUpdate');

Route::get('/dashboard/charts', function () {
    return view('dashboard.charts');
});
Route::get('/dashboard/index', function () {
    return view('dashboard.index');
});
Route::get('/dashboard/login', function () {
    return view('dashboard.login');
});
Route::get('/dashboard/elements', function () {
    return view('dashboard.elements');
});
Route::get('/dashboard/panels', function () {
    return view('dashboard.panels');
});
Route::get('/dashboard/manage','OrdersSetController@homeManage');

Route::post('/status/update/{id}','OrdersSetController@StatusUpdate');
Route::post('/reject/order/{id}','OrdersSetController@RejectOrder');
Route::get('/dashboard/order/confirm/{id}', function ($id) {
    $userID = Auth::user()->id;
    $user = DB::select('select * from users');
    $status = DB::select('select * from status');
    $order = DB::select('select * from orders  where id = ?',[$id]);
    $orderdetail = DB::select('select * from orderdetails ');
    $payment = DB::select('select * from payments');
    $product = DB::select('select * from products');
    $promotion = DB::select('select * from promotion');
    return view('dashboard.status.confirm',['orders' => $order,'orderdetails' => $orderdetail,'users' => $user,'userID' => $userID,'status' => $status,'products' => $product,'payment' => $payment,'promotion' => $promotion]);
});
Route::get('/dashboard/order', function () {
    $user = DB::select('select * from users');
    $status = DB::select('select * from status');
    $order = DB::select('select * from orders');
    return view('dashboard.status.order',['orders' => $order,'users' => $user,'status' => $status]);
});
Route::get('/dashboard/manage/{id}','OrdersSetController@showManage');
Route::post('/dashboard/mange/store','ToDoListController@store');
Route::get('/dashboard/mange/delete/{id}','ToDoListController@delete');

Route::get('/dashboard/promotion','PromotionController@home');
Route::get('/dashboard/promotion/new', 'PromotionController@new');
Route::post('/dashboard/promotion/store/','PromotionController@store');
Route::get('/dashboard/promotion/edit/{id}','PromotionController@edit');
Route::post('/dashboard/promotion/update/{id}','PromotionController@update');
Route::get('/dashboard/promotion/delete/{id}','PromotionController@delete');

Route::get('/dashboard/payment', function () {
    $store = DB::select('select * from store');
    return view('dashboard.stores.payment',['store' => $store]);
});
Route::get('/dashboard/payment/edit/{id}','StoreController@editPay');
Route::post('/dashboard/payment/update/{id}','StoreController@updatePay');

Route::get('/dashboard/store', function(){
    $topics = DB::select('select * from topic_homepage');
    $work = DB::select('select * from workings');
    $store = DB::select('select * from store');
    return view('dashboard.stores.store',['topic_homepage' => $topics,'workings' => $work,'store' => $store]);
});
Route::get('/dashboard/store/editStore/{id}',function($id){
    $store = DB::select('select * from store where id = ?',[$id]);
    return view('dashboard.stores.editStore',['store' => $store]);
});
Route::post('/dashboard/store/update/{id}','StoreController@update');
Route::get('/dashboard/store/editTopic/{id}', function($id){
    $topics = DB::select('select * from topic_homepage where id = ?',[$id]);
    return view('dashboard.stores.editTopic',['topic_homepage' => $topics]);
});
Route::post('/dashboard/topic/update/{id}','TopicController@update');
Route::get('/dashboard/store/editWorkings/{id}', function($id){
    $work = DB::select('select * from workings where id = ?',[$id]);
    return view('dashboard.stores.editWorkings',['workings' => $work]);
});
Route::post('/dashboard/workings/update/{id}','WorkingsController@update');