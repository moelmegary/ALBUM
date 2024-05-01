<?php

namespace App\Http\Controllers;

use App\Models\CreateAlbum;
use Illuminate\Http\Request;
use App\models\ImageGallery;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ImageGalleryController extends Controller
{
    //

    public function index()
    {
    	$images = ImageGallery::get();
    	return view('image-gallery',compact('images'));
    }


    /**
     * Upload image function
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
    	$this->validate($request, [
    		'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $input['image']);


        $input['title'] = $request->title;
        ImageGallery::create($input);


    	return back()
    		->with('success','Image Uploaded successfully.');
    }


    /**
     * Remove Image function
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	ImageGallery::find($id)->delete();
    	return back()
    		->with('success','Image removed successfully.');
    }
    /*
    display home page
    */
    public function home()
    {
        $albumList=CreateAlbum::select('id','aName','maxPic')->get();
        $firstPic=DB::table('image_gallery')->where('image')->first();
        return view('home' ,compact(var_name:['albumList','firstPic']));

    }
    /*
    view albumAdd page
    */
    public function add()
    {

    	return view(view:'albumAdd');

    }
     /*
    create new album
    */
    public function saveAlbum(Request $req){
        $albums= new CreateAlbum();
        $albums->aName= $req->aName;
        $albums->maxPic=$req->maxPic;

        $res=$albums->save();
        return "saved";

    }
     /*
    edit albums
    */
    public function editAlbum($id){
        $album=CreateAlbum::find($id);
        $album=CreateAlbum::select('id','aName','maxPic')->find($id);
        return view('albumEdit',compact(var_name:'album'));
    }
     /*
    update albums
    */
    public function updateAlbum(Request $req,$id){
        $album=DB::table('album')->where('id',$id);
        $save=$album->update([
            'aName'=>$req->aName,
            'maxPic'=>$req->maxPic,
        ]);
    }
     /*
    delte album
    */
    public function deleteAlbum(Request $req,$album_id){

     $album=CreateAlbum::find($album_id);

    if($album->ImageGallery()->count()>0){
         return view('optionDelete',compact(var_name:'album_id'));
    }
    else{
    $album->delete();
    return redirect()->route('main')->with('success','album deleted sucessfully');
    }
}
 /*
    option if non empty
    */
 public function optionDelete(Request $req , $id){

    $album=CreateAlbum::find($id);
    if($req->input('action')=='delete'){
        $album->ImageGallary()->delete();
        $album->delete();
        return Redirect()->with('success','album and images deleted');
    }elseif($req->input('action')=='move'){
        return view('move',compact(var_name:'id'));

    }

 }
  /*
    move images to another album
    */
 public function move(Request $req,$id){

    $album=CreateAlbum::find($id);
    $newAlbumId=$req->input('album_id');
    $newAlbum=CreateAlbum::find($newAlbumId);
    $album->ImageGallery()->update([
        'album_id'=>'newAlbumId'
    ]);
    return redirect()->route('main')->with('sucsess','picture moved');
 }


}

