<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use App\Models\Activite;
use App\Models\Club;
use App\Models\Cour;
use App\Models\Emploi;



class EtudiantDashboardController extends Controller
{



    public function headerpage() {

        return view('etudiantdashboard.header');
        
    }

    public function footerpage() {

        return view('etudiantdashboard.footer');
        
    }
   
   

    public function acceuilpage()
    {       
        return view('etudiantdashboard.acceuil'); 
    }


    
    public function emploipage()
    {       
        $emplois = Emploi::all(); 
        return view('etudiantdashboard.emploi')->with('emplois', $emplois);
    }
  
  

    public function courpagel1() {
        $cours = Cour::where('categorie', 'L1')->get();
        return view('etudiantdashboard.courl1')->with('cours', $cours); 
    }
    
     


    public function courpagel2() {
        $cours = Cour::where('categorie', 'L2')->get();
        return view('etudiantdashboard.courl2')->with('cours', $cours); 
    }
    

    public function courpagel3() {
        $cours = Cour::where('categorie', 'L3')->get();
        return view('etudiantdashboard.courl3')->with('cours', $cours); 
    }
    


    public function courpage() {

        return view ('etudiantdashboard.cour');
        
    }

    public function clubpage() {

        return view ('etudiantdashboard.club');
        
    }

 

    public function annoncepage() {
        $annonces = Annonce::all();

        return view ('etudiantdashboard.annonce')->with('annonces',$annonces);
        
    }

    public function activitepage() {

        $activites = Activite::all();

    return view ('etudiantdashboard.activite')->with('activites',$activites);
        
    }

                public function schoolpaypage() {

                    return view ('etudiantdashboard.schoolpay');
                            
               }        
               
               public function paymentSuccess() {

                    return view ('etudiantdashboard.paymentsuccess');
                            
               } 


                public function paymentCancel() {

                    return view ('etudiantdashboard.paymentcancel');
                            
               } 

}







