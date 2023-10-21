<?php

namespace App\Http\Controllers;
use App\Models\AddGallary;
use App\Models\Gallery;
use App\Models\Hostels;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class GalleryController extends Controller
{

    public $filename;

   function index( $id , $name){

  $hostel =   Hostels::find($id);
    return view('Dashboard.gallery' , compact('hostel'));
   }







   function store(Request $request)
   {
       $request->validate([
           'hostelName' => 'required',
           'location' => 'required',
           'imageFiles.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate each uploaded image.
       ]);

       $storeimages = [
           'hostelName' => $request->input('hostelName'),
           'location' => $request->input('location'),
       ];

       // Handle multiple image uploads
       if ($request->hasFile('imageFiles')) {
        $imageFiles = $request->file('imageFiles');
        $imagePaths = [];

        foreach ($imageFiles as $image) {
            $filename = $image->getClientOriginalName();
            $path = '/Gallaries';
            $image->move(public_path($path), $filename);
            $imagePaths[] = $filename;
        }

        $storeimages['imageFiles'] = json_encode($imagePaths);

           // Create a new gallery record.
           Gallery::create($storeimages);
       }

       return redirect()->route('view-galleries')->with('messageupdate', 'Gallery Added Successfully');
   }



    function viewgallaris(){
     $gallaries =  Gallery::all();
        return view('Dashboard.gallaries-list',compact('gallaries'));
    }




    function editgallary() {

        $gallaries = Gallery::find(request('id'));

              return view('Dashboard.update-gallary' , compact('gallaries'));

          }



     public function updategallary($id, Request $request)
    {
        $request->validate([
            'hostelName' => 'required',
            'location' => 'required',
            'imageFiles.*' => 'nullable|image', // Use 'imageFiles.*' to validate each uploaded image.
        ]);

        $gallery = Gallery::find($id);

        if (!$gallery) {
            return redirect()->back()->with('error', 'Gallery not found.');
        }

        $updateData = [
            'hostelName' => $request->input('hostelName'),
            'location' => $request->input('location'),
        ];

        // Handle multiple image uploads
        if ($request->hasFile('imageFiles')) {
            $imageFiles = $request->file('imageFiles');
            $imagePaths = [];

            foreach ($imageFiles as $image) {
                $filename = $image->getClientOriginalName();
                $path = '/Gallaries';
                $image->move(public_path($path), $filename);
                $imagePaths[] = $filename;
            }

            $updateData['imageFiles'] = json_encode($imagePaths);
        }

        // Update the gallery record.
        $gallery->update($updateData);

        return redirect()->route('view-galleries')->with('messageupdate', 'Gallery Updated Successfully');
    }





            function deletegallary(){

                Gallery::destroy(request('id'));

                return back()->with('deletemessage' , 'Gallary Deleted Sucessfully');


            }



            function galleryhostel($id , $name) {

                $gallaries = Gallery::where('hostel_id' , $id)->get();

                return view('Dashboard.clientgallaries-list' , compact('gallaries'));

            }
}
