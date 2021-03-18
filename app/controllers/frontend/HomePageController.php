<?php
namespace App\Controllers\Frontend;
use App\Controllers\BaseController;
use App\Models\Product;
use App\Models\Category;
use App\Models\BaseModel;
class HomePageController extends BaseController{
    public $categories;
    function __construct()
    {
        $this->categories = Category::where('show_menu', 1)->get();
    }
    public function index(){
        $latesProduct = Product::orderBy('id', 'desc')->take(8)->get();
        // $latesProduct->load('category');

        // echo '<pre>';
        // var_dump($latesProduct);die;
        $this->render('frontend.index', [
            'categories' => $this->categories,
            'latesProduct' => $latesProduct
        ]);
    }
    public function getProductOfCategory($id){
        $products = Product::where('cate_id', $id)->get();
        $category = Category::find($id);
        $this->render('frontend.catePage', [
            'products' => $products, 
            'category' => $category,
            'categories' => $this->categories
        ]);
    }

    public function detail($id){
        $product = Product::find($id);
        $product->views++;
        $product->save();
        $product = $product->load('category');

        $relateProduct = Product::where('cate_id', $product['category']['id'])
                                ->where('id', '<>', $id)
                                ->get();
        
        $this->render('frontend.detailPage', [
            'product' => $product,
            'categories' => $this->categories,
            'relateProduct' => $relateProduct
        ]);
    }

    public function search(){
        if($_POST){
            $keyword = $_POST['keyword'];
            $products = Product::where('name', 'like', "%$keyword%")
                                ->get();
            // echo '<pre>';
            // var_dump($products);die;
            $this->render('frontend.searchPage', [
                'categories' => $this->categories,
                'products' => $products,
                'keyword' => $keyword
            ]);
        } 
    }

    public function getAll($page=''){
        //$products = Product::orderBy('id', 'desc')->get();
        $page = $page == '' ? 1 : $page;
        $limit = 6;
        $totalPage = ceil(Product::count()/$limit);
        $start = ($page - 1) * $limit;

            //$start = BaseModel::paginate($products, 3, $page);
            $products = Product::take(6)
                                ->skip($start)
                                ->orderBy('id', 'desc')
                                ->get();
        $this->render('frontend.All', [
            'categories' => $this->categories,
            'products' => $products,
            'page' => $page,
            'totalPage' => $totalPage,
        ]);
    }
}

?>