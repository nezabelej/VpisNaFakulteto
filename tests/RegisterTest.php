<?php




use App\Models\Uporabnik;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Repositories\PrijavaRepository;

class RegisterTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub
    }

    public function test_register_with_correct_data()
    {
        $this->call('POST', 'registracija', ['ime' => 'Neža',
            'priimek' => 'Belej', 'email' => 'nezabelej@gmail.com', 'username' => 'nezabelej', 'password' => 'nezabelej1992']);
        $user = Uporabnik::where('email', 'nezabelej@gmail.com')->first();
        $this->assertNotEmpty($user);

    }

    public function test_register_with_incorrect_data()
    {
        $this->call('POST', 'registracija', ['ime' => 'Peter',
            'priimek' => 'Klepec', 'email' => 'nb8901@student.uni-lj.si', 'username' => 'peterklepec', 'password' => 'peterklepec']);
        $user = Uporabnik::where('email', 'nb8901@student.uni-lj.si')->first();
        $this->assertTrue(empty($user));

    }

}