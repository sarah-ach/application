<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use Validator, Input, Redirect; 


class PostsController extends Controller
{

    public $post_id,$nomP,$OperMatricule,$Date;
    function index()
    {
        
        return view("admin.posts");
    }

    public function show(  Post $post )
    {
        $posts = Post::all();
        $User = User::all();
        return view('admin.posts', compact('posts'),['User'=>$User]);
    
    }

    public function store(Request $rq)
    {
       /*  $input=$rq->all();
        Post::create($input);
        return redirect('admin/posts')->with('flash_message','Post Ajouter'); */

        $post = new Post;
        
        $post->nomP = $rq->nomP;
        $post->OperMatricule = $rq->OperMatricule;
        $post->Date = $rq->Date;
       

        $post->save();

        return redirect('admin/posts')->with('status', 'Le Post est bien ajouté');
    }

    public function delete()
    {
        Post::truncate();
        return back();
    }

    /* public function action(Request $request)
    {
        if ($request->ajax()) {
           /*  Post::find($request->pk)
                ->update([
                    $request->nomP => $request->value
                ]);
  
            return response()->json(['success' => true]); */

            /* if($request->action=='Edit')
            {
                $data=array(
                'nomP' => $request->nomP,
                'OperMatricule' => $request->OperMatricule,
                'date' => $request->date);
                
            }
            DB::table('posts') ->where('id',$request->id)->update($data);
            
        }
        return response()->json($request);
    } */ 

   /*  public function edit($id)
    {
        $post=Post::find($id);
        return view('');
    } */

    /* public function destroy($id)
    {
        Post::destroy($id);
        return redirect('admin/posts')->with('flash message', 'Le Post a bien été supprimer');
    } */

    public function destroy(Post $id)
        {
            $id->delete();
            return redirect('admin/posts')
                            ->with('status','Le post est bien supprimé');
        }
/* 
    public function editPost(int $post_id)
    {
        $post=Post::find($post_id);
        if($post)
        {
            
            $this->post_id=$post->id; 
            $this->nomP=$post->nomP;
            $this->OperMatricule=$post->OperMatricule;
            $this->Date=$post->Date;
        }else{
            return redirect()->to('/admin/posts');
        }
    } */


     public function getPost(Request $id){

        $posts = Post::find($id);
  
        $html = "";
        if(!empty($posts)){
           $html = "
             <tr>
                <td width='30%'><b>Username:</b></td>
                <td width='70%'> ".$posts->nomP."</td>
             </tr>
             <tr>
                <td width='30%'><b>Name:</b></td>
                <td width='70%'> ".$posts->OperMatricule."</td>
             </tr>
             <tr>
                <td width='30%'><b>Email:</b></td>
                <td width='70%'> ".$posts->Date."</td>
             </tr>
             ";
        }
        $response['html'] = $html;
  
        return response()->json($response);
     } 
   
}
