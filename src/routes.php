<?php

use Slim\Http\Request;
use Slim\Http\Response;
use \App\Models\User;
use \App\Models\Address;
use \App\Models\City;
use \App\Models\Computerskill;
use \App\Models\Education;
use \App\Models\Experience;
use \App\Models\Otherskill;

// Routes

$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->post('/cvs', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("POST /cvs");

    /* This piece of code is too repetitive, can be easily fixed with a loop */
    $address = new Address();
    $address->street = $request->getParam('street');
    $address->nr = $request->getParam('nr');
    $address->zip = $request->getParam('zip');
    $address->city = $request->getParam('city');
    $address->save();

    $education = new Education();
    $education->education = $request->getParam('education');
    $education->place = $request->getParam('placeEdu');
    $education->institute = $request->getParam('institute');
    $education->fromEdu = $request->getParam('fromEdu');
    $education->untilEdu = $request->getParam('untilEdu');
    $education->information = $request->getParam('informationEdu');
    $education->save();

    $experience = new Experience();
    $experience->functionExp = $request->getParam('functionExp');
    $experience->place = $request->getParam('placeExp');
    $experience->employer = $request->getParam('employer');
    $experience->fromExp = $request->getParam('fromExp');
    $experience->untilExp = $request->getParam('untilExp');
    $experience->information = $request->getParam('informationExp');
    $experience->save();

    $computerskill = new Computerskill();
    $computerskill->skill = $request->getParam('computerskill');
    $computerskill->level = $request->getParam('computerlevel');
    $computerskill->save();

    $otherskill = new Otherskill();
    $otherskill->skill = $request->getParam('otherskill');
    $otherskill->level = $request->getParam('otherlevel');
    $otherskill->save();

    $user = new User();
    $user->firstname = $request->getParam('firstname');
    $user->lastname = $request->getParam('lastname');
    $user->email = $request->getParam('email');
    $user->phonenumber = $request->getParam('phonenumber');
    $user->birthdate = $request->getParam('birthdate');
    $user->birthplace = $request->getParam('birthplace');
    $user->addresses_id = $address->id;
    $user->educations_id = $education->id;
    $user->experiences_id = $experience->id;
    $user->computerskills_id = $computerskill->id;
    $user->otherskills_id = $otherskill->id;
    $user->save();
    /* This piece of code is too repetitive, can be easily fixed with a loop */
    
    // Render index view
    return $this->renderer->render($response, 'overview.phtml', $args);
});
