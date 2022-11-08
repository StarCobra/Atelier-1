<?php


require_once "vendor/autoload.php";

use iutnc\mf\utils\HttpRequest;
use iutnc\mf\utils\AbstractHttpRequest;

class HttpRequestTest extends \PHPUnit\Framework\TestCase
{



    private function makeFakeData()
    {
        // constructs a fake SERVER variable.
        // URL = http://localhost/tweeter/test.php/stuff/morestuff/?id=15

        $_SERVER['SCRIPT_NAME'] = '/tweeter/test.php';
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_SERVER['PATH_INFO'] = '/stuff/morestuff/';
        $_GET['id'] = '15';
        $_POST['text'] = 'Un texte.';
    }

    function testSubclass()
    {

        $this->assertTrue(
            is_subclass_of('\iutnc\mf\utils\HttpRequest', '\iutnc\mf\utils\AbstractHttpRequest'),
            "FEEDBACK : La class HttpRequest doit concrétiser AbstractHttpRequest"
        );
    }

    function testScriptName()
    {

        $this->makeFakeData();
        $http_req = new HttpRequest();

        $this->assertEquals(
            $http_req->script_name,
            $_SERVER['SCRIPT_NAME'],
            "FEEDBACK : L'attribut \"script_name\" n'est pas correctement valué"
        );
    }

    function testRequestMethod()
    {
        $this->makeFakeData();
        $http_req = new HttpRequest();

        $this->assertEquals(
            $http_req->method,
            $_SERVER['REQUEST_METHOD'],
            "FEEDBACK : L'attribut \"method\" n'est pas correctement valué"
        );
    }

    function testPathInfo()
    {
        $this->makeFakeData();
        $http_req = new HttpRequest();

        $this->assertEquals(
            $http_req->path_info,
            $_SERVER['PATH_INFO'],
            "FEEDBACK : L'attribut \"path_info\" n'est pas correctement valué"
        );
    }

    function testRoot()
    {
        $this->makeFakeData();
        $http_req = new HttpRequest();

        $this->assertEquals(
            $http_req->root,
            dirname($_SERVER['SCRIPT_NAME']),
            "FEEDBACK : L'attribut \"root\" n'est pas correctement valué"
        );
    }

    function testGet()
    {
        $this->makeFakeData();
        $http_req = new HttpRequest();

        $this->assertTrue(
            $http_req->get === $_GET,
            "FEEDBACK : L'attribut \"get\" n'est pas correctement valué"
        );
    }

    function testPost()
    {

        $this->makeFakeData();
        $http_req = new HttpRequest();

        $this->assertTrue(
            $http_req->post === $_POST,
            "FEEDBACK : L'attribut \"post\" n'est pas correctement valué"
        );
    }
}
