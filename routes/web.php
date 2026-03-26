<?php



use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EtudiantDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\professeurDashboardController;
use App\Http\Controllers\ProfesseurPresenceController;
use App\Http\Controllers\ProfesseurPresencel2Controller;
use App\Http\Controllers\ProfesseurPresencel3Controller;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminClubController;
use App\Http\Controllers\AdminAnnonceController;
use App\Http\Controllers\AdminActiviteController;
use App\Http\Controllers\AdminUeController;
use App\Http\Controllers\AdminMatiereController;
use App\Http\Controllers\AdminEmploiController;
use App\Http\Controllers\AdminInscrtController;
use App\Http\Controllers\AdminPresenceController;
use App\Http\Controllers\AdminPresencel2Controller;
use App\Http\Controllers\AdminNoteController;
use App\Http\Controllers\AdminNotel2Controller;
use App\Http\Controllers\AdminNotel3Controller;
use App\Http\Controllers\PayementController;


Route::get('/', function () {
    return view('etudiantdashboard/acceuil');
});


Auth::routes();

Route::get('/etudiantdashboard/header', [App\Http\Controllers\EtudiantDashboardController::class, 'headerpage'])->name('etudiantdashboard.header');
Route::get('/etudiantdashboard/footer', [App\Http\Controllers\EtudiantDashboardController::class, 'footerpage'])->name('etudiantdashboard.footer');

Route::get('/etudiantdashboard/acceuil', [EtudiantDashboardController::class, 'acceuilpage'])->name('etudiantdashboard.acceuil');


Route::get('/etudiantdashboard/club', [App\Http\Controllers\EtudiantDashboardController::class, 'clubpage'])->name('etudiantdashboard.club');

Route::get('/etudiantdashboard/emploi', [App\Http\Controllers\EtudiantDashboardController::class, 'emploipage'])->name('etudiantdashboard.emploi');
Route::get('/etudiantdashboard/cour', [App\Http\Controllers\EtudiantDashboardController::class, 'courpage'])->name('etudiantdashboard.cour');
Route::get('/etudiantdashboard/courl1', [App\Http\Controllers\EtudiantDashboardController::class, 'courpagel1'])->name('etudiantdashboard.courl1');
Route::get('/etudiantdashboard/courl2', [App\Http\Controllers\EtudiantDashboardController::class, 'courpagel2'])->name('etudiantdashboard.courl2');
Route::get('/etudiantdashboard/courl3', [App\Http\Controllers\EtudiantDashboardController::class, 'courpagel3'])->name('etudiantdashboard.courl3');
Route::get('/etudiantdashboard/annonce', [App\Http\Controllers\EtudiantDashboardController::class, 'annoncepage'])->name('etudiantdashboard.annonce');
Route::get('/etudiantdashboard/activite', [App\Http\Controllers\EtudiantDashboardController::class, 'activitepage'])->name('etudiantdashboard.activite');

Route::get('/etudiantdashboard/schoolpay', [App\Http\Controllers\EtudiantDashboardController::class, 'schoolpaypage'])->name('etudiantdashboard.schoolpay');

Route::get('/etudiantdashboard/inscritclub', [App\Http\Controllers\ClubController::class, 'inscritpage'])->name('etudiantdashboard.inscritclub');
Route::post('/etudiantdashboard/inscritclub', [App\Http\Controllers\ClubController::class, 'clubvalidate'])->name('join-club');









Route::get('/admindashboard/headeradmin', [App\Http\Controllers\AdminDashboardController::class, 'headeradminpage'])->name('dashboard.headeradmin');
Route::get('/admindashboard/index', [App\Http\Controllers\AdminDashboardController::class, 'indexpage'])->name('admindashboard.index');
Route::get('/admindashboard/users', [App\Http\Controllers\AdminUserController::class, 'userpage'])->name('admindashboard.users');
Route::get('/admindashboard/usercreate', [App\Http\Controllers\AdminUserController::class, 'usercreatepage'])->name('admindashboard.usercreate');
Route::get('/admindashboard/{user}/useredit', [App\Http\Controllers\AdminUserController::class, 'usereditpage'])->name('admindashboard.useredit');
Route::put('/admindashboard/update/{user}', [App\Http\Controllers\AdminUserController::class, 'updateuser'])->name('userupdate');
Route::post('/admindashboard/user', [App\Http\Controllers\AdminUserController::class, 'useradmin'])->name('useradmin');
Route::delete('/admindashboard/delete/{user}', [App\Http\Controllers\AdminUserController::class, 'destroy'])->name('destroy');


Route::get('/admindashboard/inscrit', [App\Http\Controllers\AdminInscritController::class, 'inscritpage'])->name('admindashboard.inscrit');
Route::get('/admindashboard/inscritcreate', [App\Http\Controllers\AdminInscritController::class, 'inscritcreatepage'])->name('admindashboard.inscritcreate');
Route::get('/admindashboard/{inscrit}/inscritedit', [App\Http\Controllers\AdminInscritController::class, 'inscriteditpage'])->name('admindashboard.inscritedit');
Route::put('/admindashboard/update/{inscrit}', [App\Http\Controllers\AdminInscritController::class, 'updateinscrit'])->name('inscritupdate');
Route::post('/admindashboard/inscrit', [App\Http\Controllers\AdmininscrItController::class, 'validateinscrit'])->name('inscritadmin');
Route::delete('/admindashboard/delete/{inscrit}', [App\Http\Controllers\AdminInscritController::class, 'destroy'])->name('inscritdestroy');




Route::get('/admindashboard/club', [App\Http\Controllers\AdminClubController::class, 'clubpage'])->name('admindashboard.club');
Route::get('/admindashboard/{club}/clubedit', [App\Http\Controllers\AdminClubController::class, 'clubeditpage'])->name('admindashboard.clubedit');
Route::post('/admindashboard/annonce', [App\Http\Controllers\AdminAnnonceController::class, 'validateannonce'])->name('annonceadmin');

Route::put('/admindashboard/update/{club}', [App\Http\Controllers\AdminClubController::class, 'updateclub'])->name('clubupdate');
Route::delete('/admindashboard/delete/{club}', [AdminClubController::class, 'destroy'])->name('clubdestroy');




Route::get('/admindashboard/presence', [App\Http\Controllers\AdminPresenceController::class, 'adminpresencepage'])->name('admindashboard.presence');
Route::get('/admindashboard/presencel2', [App\Http\Controllers\AdminPresencel2Controller::class, 'adminpresencel2page'])->name('admindashboard.presencel2');
Route::get('/admindashboard/presencel3', [App\Http\Controllers\AdminPresencel3Controller::class, 'adminpresencel3page'])->name('admindashboard.presencel3');
Route::delete('/admindashboard/delete/{presence}', [App\Http\Controllers\adminPresenceController::class, 'destroy'])->name('adminpresencedestroy');
Route::delete('/admindashboard/delete/{presencel2}', [App\Http\Controllers\adminPresencel2Controller::class, 'destroyl2'])->name('adminpresencel2destroy');
Route::delete('/admindashboard/delete/{presencel3}', [App\Http\Controllers\adminPresencel3Controller::class, 'destroyl3'])->name('adminpresencel3destroy');







Route::get('/admindashboard/annonce', [App\Http\Controllers\AdminAnnonceController::class, 'annoncepage'])->name('admindashboard.annonce');
Route::get('/admindashboard/annoncecreate', [App\Http\Controllers\AdminAnnonceController::class, 'annoncecreatepage'])->name('admindashboard.annoncecreate');
Route::get('/admindashboard/editannonce/{annonce}', [App\Http\Controllers\AdminAnnonceController::class, 'editpage'])->name('admindashboard.editannonce');
Route::post('/admindashboard/annonce', [App\Http\Controllers\AdminAnnonceController::class, 'validateannonce'])->name('annonceadmin');
Route::put('/admindashboard/update/{annonce}', [App\Http\Controllers\AdminAnnonceController::class, 'updateannonce'])->name('annonceupdate');
Route::delete('/admindashboard/delete/{annonce}', [AdminAnnonceController::class, 'destroy'])->name('annoncedestroy');




Route::get('/admindashboard/activite', [App\Http\Controllers\AdminActiviteController::class, 'activitepage'])->name('admindashboard.activite');
Route::get('/admindashboard/activitecreate', [App\Http\Controllers\AdminActiviteController::class, 'activitecreatepage'])->name('admindashboard.activitecreate');
Route::post('/admindashboard/activite', [App\Http\Controllers\AdminActiviteController::class, 'validateactivite'])->name('activiteadmin');
Route::get('/admindashboard /{activite}/activiteedit', [App\Http\Controllers\AdminActiviteController::class, 'activiteeditpage'])->name('admindashboard.editactivite');
Route::put('/admindashboard/update/{activite}', [App\Http\Controllers\AdminActiviteController::class, 'updateactivite'])->name('activiteupdate');
Route::delete('/admindashboard/delete/{activite}', [AdminActiviteController::class, 'destroy'])->name('activitedestroy');




Route::get('/admindashboard/ue', [App\Http\Controllers\AdminUeController::class, 'uepage'])->name('admindashboard.ue');
Route::get('/admindashboard/uecreate', [App\Http\Controllers\AdminUeController::class, 'uecreatepage'])->name('admindashboard.uecreate');
Route::post('/admindashboard/ue', [App\Http\Controllers\AdminUeController::class, 'ueadmin'])->name('ueadmin');
Route::get('/admindashboard/ueedit/{ue}', [App\Http\Controllers\AdminUeController::class, 'ueeditpage'])->name('admindashboard.ueedit');
Route::put('/admindashboard/update/{ue}', [App\Http\Controllers\AdminUeController::class, 'update'])->name('ueupdate');
Route::delete('/admindashboard/delete/{ue}', [App\Http\Controllers\AdminUeController::class, 'destroy'])->name('uedestroy');




Route::get('/admindashboard/matiere', [App\Http\Controllers\AdminMatiereController::class, 'matierepage'])->name('admindashboard.matiere');
Route::get('/admindashboard/matierecreate', [App\Http\Controllers\AdminMatiereController::class, 'matierecreatepage'])->name('admindashboard.matierecreate');
Route::post('/admindashboard/matiere', [App\Http\Controllers\AdminMatiereController::class, 'validatematiere'])->name('matiereadmin');
Route::get('/admindashboard/matiereedit/{matiere}', [App\Http\Controllers\AdminMatiereController::class, 'matiereeditpage'])->name('admindashboard.editmatiere');
Route::put('/admindashboard/update/{matiere}', [App\Http\Controllers\AdminMatiereController::class, 'update'])->name('matiereupdate');
Route::delete('/admindashboard/delete/{matiere}', [AdminMatiereController::class, 'destroy'])->name('matieredestroy');






Route::get('/admindashboard/emploi', [App\Http\Controllers\AdminEmploiController::class, 'emploipage'])->name('admindashboard.emploi');
Route::get('/admindashboard/emploicreate', [App\Http\Controllers\AdminEmploiController::class, 'emploicreatepage'])->name('admindashboard.emploicreate');
Route::post('/admindashboard/emploi', [App\Http\Controllers\AdminEmploiController::class, 'validateemploi'])->name('emploiadmin');
Route::get('/admindashboard/emploiedit/{emploi}', [App\Http\Controllers\AdminEmploiController::class, 'emploieditpage'])->name('admindashboard.emploiedit');
Route::put('/admindashboard/update/{emploi}', [App\Http\Controllers\AdminEmploiController::class, 'update'])->name('emploiupdate');
Route::delete('/admindashboard/delete/{emploi}', [AdminEmploiController::class, 'destroy'])->name('emploidestroy');





Route::get('/professeurdashboard/cour', [App\Http\Controllers\professeurDashboardController::class, 'courpage'])->name('professeurdashboard.cour');
Route::get('/professeurdashboard/courcreate', [App\Http\Controllers\professeurDashboardController::class, 'courcreatepage'])->name('professeurdashboard.courcreate');
Route::post('/professeurdashboard/courprofesseur', [App\Http\Controllers\professeurDashboardController::class, 'validatecour'])->name('courprof');
Route::get('/professeurdashboard/couredit/{id}', [App\Http\Controllers\professeurDashboardController::class, 'editpage'])->name('professeurdashboard.couredit');
Route::put('/professeurdashboard/update/{id}', [App\Http\Controllers\professeurDashboardController::class, 'updatecour'])->name('courupdate');
Route::delete('/professeurdashboard/delete/{id}', [App\Http\Controllers\professeurDashboardController::class, 'destroy'])->name('courdestroy');
Route::get('/professeurdashboard/header', [App\Http\Controllers\professeurDashboardController::class, 'headerpage'])->name('professeurdashboard.header');
Route::get('/professeurdashboard/acceuil', [App\Http\Controllers\professeurDashboardController::class, 'acceuilpage'])->name('professeurdashboard.acceuil');


Route::get('/professeurdashboard/presencecreate', [App\Http\Controllers\ProfesseurPresenceController::class, 'presencecreatepage'])->name('professeurdashboard.presencecreate');
Route::get('/professeurdashboard/presencel2create', [App\Http\Controllers\ProfesseurPresencel2Controller::class, 'presencel2createpage'])->name('professeurdashboard.presencel2create');
Route::get('/professeurdashboard/presencel3create', [App\Http\Controllers\ProfesseurPresencel3Controller::class, 'presencel3createpage'])->name('professeurdashboard.presencel3create');
Route::post('/professeurdashboard/presenceprofesseur', [App\Http\Controllers\ProfesseurPresenceController::class, 'validatepresence'])->name('presenceprof');
Route::post('/professeurdashboard/presencel2professeur', [App\Http\Controllers\ProfesseurPresencel2Controller::class, 'validatepresencel2'])->name('presencel2prof');
Route::post('/professeurdashboard/presencel3professeur', [App\Http\Controllers\ProfesseurPresencel3Controller::class, 'validatepresencel3'])->name('presencel3prof');
Route::get('/professeurdashboard/presencel2edit/{presencel2}', [App\Http\Controllers\ProfesseurPresencel2Controller::class, 'editl2page'])->name('professeurdashboard.presencel2edit');
Route::get('/professeurdashboard/presencel3edit/{presencel3}', [App\Http\Controllers\ProfesseurPresencel3Controller::class, 'editl3page'])->name('professeurdashboard.presencel3edit');
Route::get('/professeurdashboard/presenceedit/{presence}', [App\Http\Controllers\ProfesseurPresenceController::class, 'editpage'])->name('professeurdashboard.presenceedit');
Route::put('/professeurdashboard/update/{presence}', [App\Http\Controllers\ProfesseurPresenceController::class, 'updatepresence'])->name('presenceupdate');
Route::put('/professeurdashboard/update/{presence}', [App\Http\Controllers\ProfesseurPresencel2Controller::class, 'updatepresencel2'])->name('presencel2update');
Route::put('/professeurdashboard/update/{presence}', [App\Http\Controllers\ProfesseurPresencel3Controller::class, 'updatepresencel3'])->name('presencel3update');
Route::delete('/professeurdashboard/delete/{presence}/', [App\Http\Controllers\ProfesseurPresenceController::class, 'destroy'])->name('presencedestroy');
Route::delete('/professeurdashboard/delete/{presencel2}/', [App\Http\Controllers\ProfesseurPresencel2Controller::class, 'destroyl2'])->name('presencel2destroy');
Route::delete('/professeurdashboard/delete/{presencel3}/', [App\Http\Controllers\ProfesseurPresencel3Controller::class, 'destroyl3'])->name('presencel3destroy');
Route::get('/professeurdashboard/presence', [App\Http\Controllers\ProfesseurPresenceController::class, 'presencepage'])->name('professeurdashboard.presence');
Route::get('/professeurdashboard/presencel2', [App\Http\Controllers\ProfesseurPresencel2Controller::class, 'presencel2page'])->name('professeurdashboard.presencel2');
Route::get('/professeurdashboard/presencel3', [App\Http\Controllers\ProfesseurPresencel3Controller::class, 'presencel3page'])->name('professeurdashboard.presencel3');










Route::get('/admindashboard/notecreate', [App\Http\Controllers\AdminNoteController::class, 'notecreatepage'])->name('admindashboard.notecreate');
Route::get('/admindashboard/notel2create', [App\Http\Controllers\AdminNotel2Controller::class, 'notel2createpage'])->name('admindashboard.notel2create');
Route::get('/admindashboard/notel3create', [App\Http\Controllers\AdminNotel3Controller::class, 'notel3createpage'])->name('admindashboard.notel3create');

Route::post('/admindashboard/noteadmin', [App\Http\Controllers\AdminNoteController::class, 'validatenote'])->name('noteadmin');
Route::post('/admindashboard/notel2admin', [App\Http\Controllers\AdminNotel2Controller::class, 'validatenotel2'])->name('notel2admin');
Route::post('/admindashboard/notel3admin', [App\Http\Controllers\AdminNotel3Controller::class, 'validatenotel3'])->name('notel3admin');

Route::get('/admindashboard/notel2edit/{notel2}', [App\Http\Controllers\AdminNotel2Controller::class, 'editl2page'])->name('admindashboard.notel2edit');
Route::get('/admindashboard/notel3edit/{notel3}', [App\Http\Controllers\AdminNotel3Controller::class, 'editl3page'])->name('admindashboard.notel3edit');
Route::get('/admindashboard/noteedit/{id}', [App\Http\Controllers\AdminNoteController::class, 'editpage'])->name('admindashboard.noteedit');

Route::put('/admindashboard/update/{id}', [App\Http\Controllers\AdminNoteController::class, 'updatenote'])->name('noteupdate');
Route::put('/admindashboard/update/{notel2}', [App\Http\Controllers\AdminNotel2Controller::class, 'updatenotel2'])->name('notel2update');
Route::put('/admindashboard/update/{notel3}', [App\Http\Controllers\AdminNotel3Controller::class, 'updatenotel3'])->name('notel3update');

Route::delete('/admindashboard/delete/{id}', [App\Http\Controllers\AdminNoteController::class, 'destroy'])->name('destroy');
Route::delete('/admindashboard/delete/{notel2}', [App\Http\Controllers\AdminNotel2Controller::class, 'destroyl2'])->name('notel2destroy');
Route::delete('/admindashboard/delete/{notel3}', [App\Http\Controllers\AdminNotel3Controller::class, 'destroyl3'])->name('notel3destroy');

Route::get('/admindashboard/note', [App\Http\Controllers\AdminNoteController::class, 'notepage'])->name('admindashboard.note');
Route::get('/admindashboard/notel2', [App\Http\Controllers\AdminNotel2Controller::class, 'notel2page'])->name('admindashboard.notel2');
Route::get('/admindashboard/notel3', [App\Http\Controllers\AdminNotel3Controller::class, 'notel3page'])->name('admindashboard.notel3');







  
Route::get('/admindashboard/cours', [App\Http\Controllers\AdminCourController::class, 'courpage'])->name('admindashboard.cours');

Route::delete('/admindashboard/delete/{id}', [App\Http\Controllers\AdminCourController::class, 'destroy'])->name('couradmindestroy');


Route::get('/admindashboard/paiement', [App\Http\Controllers\AdminDashbordController::class, 'paiementpage'])->name('Admindashboard.paiement');





     Route::get('/etudiantdashboard/schoolpay', [App\Http\Controllers\EtudiantDashboardController::class, 'schoolpaypage'])->name('etudiantdashboard.schoolpay');
     Route::get('/etudiantdashboard/paymentsuccess', [EtudiantDashboardController::class, 'paymentSuccess'])->name(' etudiantdashboard.paymentsuccess');
Route::get('/etudiantdashboard/paymentcancel', [EtudiantDashboardController::class, 'paymentCancel'])->name(' etudiantdashboard.paymentcancel');

 
                



Route::get('/payment', [PayementController::class, 'showPaymentForm'])->name('payment.form');
Route::post('/payment/process', [PayementController::class, 'processPayment'])->name('payment.process');
Route::post('/payment/callback', [PayementController::class, 'handleCallback'])->name('payment.callback');