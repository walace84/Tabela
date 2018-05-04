<?php

// One To One 1 para 1
Route::get('/oneTone', 'OneToOneController@OneToOne');
// One To One invertido
Route::get('/onetoneinvertido', 'OneToOneController@OneToOneInvertido');
// cadastra o pais o sua latitude
Route::get('/onetoneinsert', 'OneToOneController@OneToOneInsert');



// Relacionamento 1 para muitos, 1 pais muitos estados
Route::get('oneTomany', 'OneToManyController@OnToMany');
// Muitos para 1, muitos estados 1 pais
Route::get('manyToone', 'OneToManyController@ManyToOne');

// lista pais estados e cidade
Route::get('manyTomanyTwo', 'OneToManyController@ManyToOneTwo');


// cadastrar estado no pais
Route::get('oneTomanyinsert', 'OneToManyController@OneToManyInsert');


// lista as cidados do pais muito para varios
Route::get('hasmanythrough', 'HasManyThrougth@hasmanythrough');

// mostra as empresas na cidades
Route::get('many-to-many', 'ManyToMany@manytomany');
// mostra em qual cidade a empresa está localizada.
Route::get('many-to-manyinverse', 'ManyToMany@manytomanyInverse');
// inseri na tabela pivo company_city, mais 2 cidade onde está localizado a empresa em questão.
Route::get('manytomanyinsert', 'ManyToMany@ManyToManyInsert');

// lista os comentários
Route::get('polymorphics', 'Polymorphic@polymorphics');
// inseri os comentários
Route::get('polymorphicsinsert', 'Polymorphic@polymorphicsInsert');


Route::get('/', function () {
    return view('welcome');
});
