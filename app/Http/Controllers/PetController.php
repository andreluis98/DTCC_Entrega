<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\User;

class PetController extends Controller
{
    
    public function index(){

        $pets = Pet::all();

        return view('welcome',['pets' => $pets]);
    }

    public function create() {
        return view ('pets.create');
    }

    public function store(Request $request){

        $pet = new Pet;

        $pet->title = $request->title;
        $pet->date = $request->date;
        $pet->description = $request->description;
        $pet->city = $request->city;
        $pet->sex = $request->sex;
        $pet->category = $request->category;
        $pet->endereço = $request->endereço;
        $pet->number = $request->number;
        $pet->complemento = $request->complemento;
        $pet->refere = $request->refere;
    
        $pet->contato = $request->contato;
        $pet->items = $request->items;

        //iMAGE UPLOAD
        if($request->hasfile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now") ). "." . $extension;

            $requestImage->move(public_path('img/pets'), $imageName);

            $pet->image = $imageName;

        }

        $user = auth()->user();
        $pet->user_id = $user->id;

        $pet->save();

        return redirect('/')->with('msg', 'Ocorrencia realizada com sucesso!');

    }

    public function show($id){

        $pet = Pet::findOrFail($id);

        $user = auth()->user();
        $hasUserJoined = false;

        if($user) {

            $userPets = $user->petsAsParticipant->toArray();

            foreach($userPets as $userPet){
                if($userPet['id'] == $id){
                    $hasUserJoined = true;
                }
            }

        }

        $petOwner = User::where('id', $pet->user_id)->first()->toArray();

        return view ('pets.show',['pet' => $pet, 'petOwner' => $petOwner, 'hasUserJoined' => $hasUserJoined]);
    
    }

    public function dashboard(){

        $user = auth()->user();

        $pets = $user->pets;

        $petsAsParticipant = $user->petsAsParticipant;

        return view('pets.dashboard', ['pets' => $pets, 'petsasparticipant' => $petsAsParticipant]);

    }

    public function destroy($id){

        Pet::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Ocorrencia excluida com sucesso!');

    }

    public function edit($id) {

        $user = auth()->user();

        $pet = Pet::findOrFail($id);

        if($user->id != $pet->user_id){
            return redirect('/dashboard');
        }

        return view('pets.edit', ['pet' => $pet]); 

    }

    public function update(Request $request){
        $data = $request->all();
                   //iMAGE UPLOAD
                   if($request->hasfile('image') && $request->file('image')->isValid()) {

                    $requestImage = $request->image;
        
                    $extension = $requestImage->extension();
        
                    $imageName = md5($requestImage->getClientOriginalName() . strtotime("now") ). "." . $extension;
        
                    $requestImage->move(public_path('img/pets'), $imageName);
        
                    $data['image'] = $imageName;
        
                }
        Pet::findOrFail($request->id)->update($data);
        return redirect('/dashboard')->with('msg', 'Ocorrencia editada com sucesso!');
 

    }

    public function joinEvent($id){

        $user = auth()->user();
        $user->petsAsParticipant()->attach($id);

        $pet = Pet::FindOrFail($id);

        return redirect('/dashboard')->with('msg', 'Solicitação de resgate realizada com sucesso!!, As informações foram encaminhadas por Email!');

    }

    public function leaveEvent($id){

        $user = auth()->user();

        $user->petsAsParticipant()->detach($id);

        $pet = Pet::FindOrFail($id);

        return redirect('/dashboard')->with('msg', 'Solicitação processada com sucesso!');



    }




}


