<?php

namespace App\Http\Controllers;

use App\Models\manager;
use Illuminate\Http\Request;
use App\Models\Buyer;
use App\Models\User;
use App\Models\Contest;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manager.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //echo "mesba";
       return view('manager.create_manager');
    }
    public function dash()
    {
        echo "mesba";
      // return view('admin.dashboard');
    }
    public function profile()
    {
        
       return view('manager.profile');
    }
    
    public function projectlist()
    {
         $projects = Buyer::all();
    
        return view('manager.projectlist')->with('projects',$projects);
      // return view('manager.projectlist');
    }
     public function projectlist_details($id)
    {
        $project = Buyer::find($id);
        return view('manager.projectlist_details')->with('project',$project);
   
    }
    public function delete_project($id){
        $project = Buyer::find($id);
        return view('manager.projectlist_delete')->with('project', $project);
    }

    public function destroy_project($id){
       
        Buyer::destroy($id);
        return redirect()->route('Manager.projectlist');
    } 


    public function contestlist()
    {
        $contests = Contest::all();
       // redirect()->route('/protfolio')->with('user',$user);
       return view('manager.contestlist')->with('contests',$contests);
    }
     public function contestlist_details($id)
    {
        $contest = Contest::find($id);
        return view('manager.contestlist_details')->with('contest',$contest);
   
    }
    public function delete_contest($id){
        $contest= Contest::find($id);
        return view('manager.contestlist_delete')->with('contest', $contest);
    }

    public function destroy_contest($id){
        
        $contests = Contest::all(); 
        Contest::destroy($id);
        return view('manager.contestlist')->with('contests',$contests);
        // return redirect()->route('manager.contestlist');
    }
    public function download(Request $req,$file)
    {
        return response()->download(public_path('protfolio_img/'.$file));
    }
    public function payment()
    {
        //echo "mesb
       return view('manager.create_manager');
    }
    public function sellerlist()
    {
        $users = User::all();
       return view('manager.sellerlist')->with('users',$users);
    }
    public function buyerlist()
    {
        $users = User::all();
       return view('manager.buyerlist')->with('users',$users);
    }

    

    



    public function suspendProject(Request $req,$id)
    {  
        $project = Buyer::find($id);
        $project->active=0;
        $project->save();
       return view('manager.projectlist_details')->with('project',$project);
    }
     public function activeProject(Request $req,$id)
    {  
        $project = Buyer::find($id);
        $project->active=1;
        $project->save();
        return view('manager.projectlist_details')->with('project',$project);
    }
     public function projectsPending()
    {  
      $projects = Buyer::all();
       return view('manager.pendingProject')->with('projects',$projects);
    }
     public function projectsapprove($id)
    {  
     // $users = User::where('active', 0)
         // ->where('destination', 'San Diego')
          //->update(['delayed' => 1]);
        $project = Buyer::find($id);
        $project->active = "1";
        $project->save();
       return redirect()->route('manager.pendingProject');
    } 

   
    public function suspendContest(Request $req,$id)
    {  
        $contest = Contest::find($id);
        $contest->active=0;
        $contest->save();
       return view('manager.contestlist_details')->with('contest',$contest);
    }
     public function activeContest(Request $req,$id)
    {  
        $contest = Contest::find($id);
        $contest->active=1;
        $contest->save();
        return view('manager.contestlist_details')->with('contest',$contest);
    }
     public function contestsPending()
    {  
      $contests = Contest::all();
       return view('manager.pendingContest')->with('contests',$contests);
    }
     public function contestsapprove($id)
    {  
     // $users = User::where('active', 0)
         // ->where('destination', 'San Diego')
          //->update(['delayed' => 1]);
        $contest = Contest::find($id);
        $contest->active = "1";
        $contest->save();
       return redirect()->route('manager.pendingContest');
    } 

    


    
}
// /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     echo "mesba";
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\admin  $admin
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(admin $admin)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\admin  $admin
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(admin $admin)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\admin  $admin
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, admin $admin)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\admin  $admin
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(admin $admin)
    // {
    //     //
    // }