<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\product;
use App\Models\sort;

class productController extends Controller
{
   
    public function index()
    {
        $data['tmp'] = $this->qstring();

        $text1 = request('text1');
        $data['text1'] = $text1;
        $data['list'] = $this->getlist($text1);
        return view('product.index', $data);
    }
    
    public function getlist($text1)
    {
        $result = Product::leftjoin('sorts','products.sort_id','=','sorts.id')->
            select('products.*','sorts.name as sorts_name')->
            where('products.name','like','%'.$text1.'%')->
            orderby('products.name','asc')->paginate(5)->
            appends(['text1'=>$text1]);

        return $result;
    }

    public function getlist_sort()
    {
        $result = Sort::orderby('name')->get();
        return $result;
    }

    public function create()
    {
        $data['list'] = $this->getlist_sort();

        $data['tmp'] = $this->qstring();
        return view('product.create', $data);
    }

    public function store(Request $request)
    {
        $row = new product;
        $this->save_row($request, $row);

        $tmp = $this->qstring();
        return redirect('product' . $tmp);
    }

    public function show($id)
    {
        $data['tmp'] = $this->qstring();
        
        $data['row'] = product::leftjoin('sorts','products.sort_id','=','sorts.id')->
            select('products.*','sorts.name as sorts_name')->
            where('products.id','=',$id)->first();
        return view('product.show', $data);
    }

    public function edit($id)
    {
        $data['list'] = $this->getlist_sort();

        $data['tmp'] = $this->qstring();
        $data['row'] = product::find($id);
        return view('product.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $row = product::find($id);
        $this->save_row($request, $row);

        $tmp = $this->qstring();
        return redirect('product' . $tmp);
    }

    public function destroy($id)
    {
        Product::find($id);

        $tmp = $this->qstring();
        return redirect('product' . $tmp);
    }
    
    public function save_row(Request $request, $row)
    {
        $request->validate([
            'sort_id' => 'required | numeric',
            'name'    => 'required | max:20',
            'price'   => 'required | numeric'
        ],
        [
            'sort_id.required'  => '구분명은 필수입력입니다.',
            'name.required'     => '이름은 필수입력입니다.',
            'price.required'    => '단가는 필수입력입니다.',
            'name.max'          => '20자 이내로 입력해주세요.'
        ]);

        $row->sort_id = $request->input('sort_id');
        $row->name    = $request->input('name');
        $row->price   = $request->input('price');
        $row->stock   = $request->input('stock');
        
        if($request->hasFile('picture')){
            
            $picture = $request->file('picture');
            $picture_name = $picture -> getClientOriginalName(); //파일이름
            $picture -> storeAs('public/product_img', $picture_name);  //파일저장

            // $img = Image::make($pic)
            //     ->resize(null, 200, function($constraint) { $constraint->aspecRatio(); })
            //     ->save('storage/product_img/thumb/'. $pic_name);

            $row->picture = $picture_name;
        }

        $row->save();
    }

    public function qstring()
    {
        $text1 = request("text1") ? request('text1') : "";
        $page = request('page') ? request('page') : "1";

        $tmp = $text1 ? "?text1 = $text1&page=$page" : "?page=$page";

        return $tmp;
    }

    public function jaego()
    {
        DB::statement('drop table if exists temps;');
        DB::statement('create table temps(
            id int not null auto_increment,
            products_id int,
            jaego int default 0,
            primary key(id) );');
        DB::statement('update products set stock=0;');
        DB::statement('insert into temps (products_id, jaego)
         select products_id, sum(numi)-sum(numo)
            from jangbus
            group by products_id;');
        DB::statement('update products join temps
            on products.id=temps.products_id
            set products.stock=temps.jaego;');

        return redirect('product');
    }
}