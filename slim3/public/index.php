<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require './vendor/autoload.php';
require 'src/database.php';
$app = new \Slim\App;

// $app->get('/products',function (Request $request, Response $response, array $args) use ($db){
//     $stmt = $db->query("select * from products");
//     $rs = $stmt->fetchAll();
//     echo(json_encode($rs));
// });

// $app->post('/products',function (Request $request, Response $response, array $args) use ($db){
//     $body = $request->getBody();
//     $data = json_decode($body,true);

//   $data['name'];
//   $data['description'];
//   $data['price'];
//   $stmt= $db->prepare("INSERT INTO products(name, description, price) VALUES (:name, :description, :price)");
//   $stmt->execute([
//    'name'=>$data['name'],                
//    'description'=>$data['description'],                
//    'price'=>$data['price']               
// ]);
//   echo("Insertion avec success");
// });
// $app->put('/products/{id}',function (Request $request, Response $response, array $params) use ($db){
//     $body = $request->getBody();
//     $data = json_decode($body,true);

//   $data['name'];
//   $data['description'];
//   $data['price'];
//   $params['id'];
//   $stmt= $db->prepare("UPDATE products SET name=:name,description=:description,price=:price WHERE id=:id");
//   $stmt->execute([
//    'name'=>$data['name'],                
//    'description'=>$data['description'],                
//    'price'=>$data['price'],               
//    'id'=> $params['id']            
// ]);
// echo("Modification avec success");
// });
// $app->delete('/products/{id}',function (Request $request, Response $response, array $params) use ($db){
//     $params['id'];
    
//     $stmt= $db->prepare("DELETE FROM products WHERE id=:id");
//     $stmt->execute([
//         'id'=> $params['id']               
//  ]);
//     echo("Suppression avec success");
//  });
// $app->post('/products',function (Request $request, Response $response, array $args) use ($db){
//    $name= $request->getParam('name');
//    $description= $request->getParam('description');
//    $price= $request->getParam('price');
   
//    $stmt= $db->prepare("INSERT INTO products(name, description, price) VALUES (:name, :description, :price)");
//    $stmt->execute([
//     'name'=>$name,                
//     'description'=>$description,                
//     'price'=>$price               
// ]);
//    echo("Insertion avec success");
// });

// $app->put('/products',function (Request $request, Response $response, array $args) use ($db){
//     $name= $request->getParam('name');
//     $description= $request->getParam('description');
//     $price= $request->getParam('price');
//     $id= $request->getParam('id');
    
//     $stmt= $db->prepare("UPDATE products SET name=:name,description=:description,price=:price WHERE id=:id");
//     $stmt->execute([
//      'name'=>$name,                
//      'description'=>$description,                
//      'price'=>$price,
//      'id'=>$id               
//  ]);
//     echo("Modification avec success");
//  });
//  $app->delete('/products',function (Request $request, Response $response, array $args) use ($db){
//     $id= $request->getParam('id');
    
//     $stmt= $db->prepare("DELETE FROM products WHERE id=:id");
//     $stmt->execute([
//      'id'=>$id               
//  ]);
//     echo("Suppression avec success");
//  });
// $app->get('/test',function (Request $request, Response $response, array $args){
//     echo('Salut les gars');
// });
// $app->get('/stock/{id}/{name}', function (Request $request, Response $response, array $args) {
//     $id = $args['id'];
//     $name = $args['name'];
//     $response->getBody()->write("Hello, $id $name");
//     // var_dump('hello Bob,$name');
//     return $response;
// });

$md = function ($request , $response, $next){
    $body=$request->getBody();
    $data = json_decode($body,true);

    if($data['age'] <= 0){
        $response->getBody()->write('Age not correct');
    }else{
        $response=$next($request,$response);
    }
    return $response;
};

$app->get('/midle',function (Request $request, Response $response, array $args) use ($db){
    $stmt = $db->query("select * from midle");
    $rs = $stmt->fetchAll();
    echo(json_encode($rs));
});
$app->post('/midle',function (Request $request, Response $response, array $args) use ($db){
    $body = $request->getBody();
    $data = json_decode($body,true);

  $data['name'];
  $data['sexe'];
  $data['age'];
  $stmt= $db->prepare("INSERT INTO midle(name, sexe, age) VALUES (:name, :sexe, :age)");
  $stmt->execute([
   'name'=>$data['name'],                
   'sexe'=>$data['sexe'],                
   'age'=>$data['age']               
]);
  echo("Insertion avec success");
})->add($md);
$app->run();