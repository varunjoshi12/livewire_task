<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Livewire\WithPagination;

class Products extends Component
{
    public $posts,$pr_name,$pr_id,$description,$price,$category_id;
    public $updateMode = false;
    use WithPagination;
	protected $paginationTheme = 'bootstrap';

 /** 
  * This method is used to show product listing
 */
    public function render(){
       $categories = Category::all();
       
        return view('livewire.products',['products'=>Product::latest()->paginate(1) ,'categories'=>$categories]);

        
    }
/** 
  * This method is used to clear form data after submit
 */
    private function resetInputFields(){

        $this->pr_name = '';
        $this->description = '';
        $this->price = '';
        $this->category_id = '';

    }
 /** 
  * This method is used to store products 
 */
    public function store(){

        $validatedDate = $this->validate([

            'pr_name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
          
        ]);

        Product::create($validatedDate);
       session()->flash('message', 'Product Created Successfully.');
       $this->resetInputFields();

    }
/** 
  * This method is used to render data on edit page 
 */
    public function edit($id){
        
        $product = Product::findOrFail($id);
       
        if($product)
        {
         
        $this->pr_id = $id;
        $this->pr_name = $product->pr_name;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->category_id = $product->category_id;
        $this->categories = Category::all();
        $this->updateMode = true;
          
        }
        else
        {
            session()->flash('message', 'No record found.');
        } 
        

    }

    public function cancel(){
        
        $this->updateMode = false;
         $this->resetInputFields();
    }
 /** 
  * This method is used to update product 
 */
     public function update(){
         $validatedDate = $this->validate([
 
            'pr_name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
         
         ]);
        
         $product = Product::find($this->pr_id);
         $product->update([
 
             'pr_name' => $this->pr_name,
             'description' => $this->description,
             'price' => $this->price,
             'category_id' => $this->category_id,
         
         ]);
 
         $this->updateMode = false;
         session()->flash('message', 'Product Updated Successfully.');
         $this->resetInputFields();
 
     }
 /** 
  * This method is used to delete product 
 */
    public function delete($id){
        Product::find($id)->delete();
         session()->flash('message', 'Product Deleted Successfully.');
 
     }
}
