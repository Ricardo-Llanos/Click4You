<?php
namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

// Se agregan los modelos (No necesario, pero para mejorar la compresión)
use App\Models\Product;
use App\Models\ShoppingCart;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * @var string - Tabla del Modelo
     */
    protected $table='users';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'names',
        'paternal_surname',
        'maternal_surname',
        'phone',
        'is_active',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'created_at' => 'datetime',
            'updated_at' => 'datetime'
        ];
    }
    

    /*================================================
        Definición de Relaciones con otras Tablas
    =================================================*/
    /**
     * Establece la relación 1:1 (Uno a Uno) con la tabla preferences.
     *
     * Relación: User-> "hasMany" ->Preference;
     * @return void
     */
    public function preference(){
        return $this->hasOne(Preference::class);
    }

    /**
     * Establece la relación 1:N (Uno a Muchos) con la tabla addresses.
     *
     * Relación: User-> "hasMany" ->Address;
     * @return void
     */
    public function addresses(){
        return $this->hasMany(Address::class);
    }

    /**
     * Establece la relación 1:N (Uno a Muchos) con la tabla file_users.
     *
     * Relación: User-> "hasMany" ->FileUser;
     * @return void
     */
    public function file_users(){
        return $this->hasMany(FileUser::class);
    }

    /**
     * Establece la relación 1:N (Uno a Muchos) con la tabla builds.
     *
     * Relación: User-> "hasMany" ->Build;
     * @return void
     */
    public function builds(){
        return $this->hasMany(Build::class);
    }

    /**
     * Establece la relación 1:N (Uno a Muchos) con la tabla orders.
     *
     * Relación: User-> "hasMany" ->Order;
     * @return void
     */
    public function orders(){
        return $this->hasMany(Order::class);
    }

    /**
     * Establece la relación N:M (Uno a muchos) con la tabla Product.
     * Establece la tabla pivote 'wish_lists'
     *      Establece la FK del modelo actual: 'user_id'
     *      Establece la FK del modelo relacionado: 'product_id'
     *
     * Relación: User->"belongsToMany"->Product.
     *
     * Aunque no se tenga una relación directa entre ambas tablas, la 'tabla pivote wish_lists' hace que exista una relación en la que un usuario pueda tener muchos productos en su Lista de Deseados.
     * @return void
     */
    public function wish_list(){
        return $this->belongsToMany(Product::class, 'wish_lists', 'user_id', 'product_id')
                ->withTimestamps();
    }

    /**
     * Establece la relación N:M (Uno a muchos) con la tabla Product.
     * Establece la tabla pivote 'shopping_carts'
     *      Establece la FK del modelo actual: 'user_id'
     *      Establece la FK del modelo relacionado: 'product_id'
     *
     * Establece la columna pivote quantity
     * 
     * Relación: User->"belongsToMany"->Product.
     *
     * Aunque no se tenga una relación directa entre ambas tablas, la 'tabla pivote shopping_carts' hace que exista una relación en la que un usuario pueda tener muchos productos en su Carrito de Compras.
     * @return void
     */
    public function shopping_cart(){
        return $this->belongsToMany(Product::class, 'wish_lists', 'user_id', 'product_id')
                ->withPivot('quantity')
                ->withTimestamps();
    }
}
?>