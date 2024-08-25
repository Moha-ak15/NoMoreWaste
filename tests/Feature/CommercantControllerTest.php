<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Commercant;

class CommercantControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_new_commercant()
    {
        // Créer un commerçant
        $commercantData = Commercant::factory()->make()->toArray();

        // ajouter le jeton CSRF a la requête
        $response = $this->post(route('commercants.store'), $commercantData, [
            '_token' => csrf_token(),
        ]);

        // Vérifier si le commerçant peut être créé
        $response = $this->post(route('commercants.store'), $commercantData);

        // Vérifier la redirection après création
        $response->assertRedirect(route('commercants.index'));

        // Vérifier que le commerçant est bien dans la base de données
        $this->assertDatabaseHas('commercants', ['email' => $commercantData['email']]);
    }

    /** @test */
    public function it_can_show_a_commercant()
{
    // Créer un commerçant
    $commercant = Commercant::factory()->create();

    // Vérifier si la vue de détail du commerçant fonctionne
    $response = $this->get(route('commercants.show', ['commercant' => $commercant->id]));

    // Vérifier le statut de la réponse
    $response->assertStatus(200);

    // Vérifier que la vue contient le commerçant
    $response->assertViewHas('commercant', $commercant);
}



    public function it_can_list_all_commercants()
    {
        // Créer des commerçants factices
        Commercant::factory()->count(5)->create();

        // Vérifier si l'index des commerçants fonctionne
        $response = $this->get(route('commercants.index'));

        // Vérifier le statut de la réponse
        $response->assertStatus(200);

        // Vérifier que la vue contient les commerçants
        $response->assertViewHas('commercants');
    }

    /** @test */
    public function it_can_update_a_commercant()
    {
        // Créer un commerçant
        $commercant = Commercant::factory()->create();

        // Mettre à jour le commerçant
        $updatedData = [
            'nom' => 'Nom Modifié',
            'adresse' => 'Nouvelle Adresse',
        ];

        $response = $this->put(route('commercants.update', $commercant->id), $updatedData);

        // Vérifier la redirection après mise à jour
        $response->assertRedirect(route('commercants.index'));

        // Vérifier que les données ont été mises à jour dans la base de données
        $this->assertDatabaseHas('commercants', $updatedData);
    }

    /** @test */
    public function it_can_delete_a_commercant()
    {
        // Créer un commerçant
        $commercant = Commercant::factory()->create();

        // Supprimer le commerçant
        $response = $this->delete(route('commercants.destroy', $commercant->id));

        // Vérifier la redirection après suppression
        $response->assertRedirect(route('commercants.index'));

        // Vérifier que le commerçant a été supprimé de la base de données
        $this->assertDatabaseMissing('commercants', ['id' => $commercant->id]);
    }
}
