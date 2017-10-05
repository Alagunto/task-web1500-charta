<?php

namespace App\Http\Controllers;

use App\Charta;
use DOMDocument;
use Illuminate\Http\Request;
use SimpleXMLElement;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function admin() {
        if(!auth()->user()->is_admin) {
            abort(403, "403 Forbidden");
        }

        /*if(auth()->user()->is_admin) {
            if(request()->method() == "GET")
                return view("admin");
            else {
                $url = request("include");
                if(starts_with($url, config("app.url")))
                    include $url;
                else {
                    echo "only this site";
                }
            }
        }*/

        return view("admin");
    }

    public function export() {
        if(!auth()->user()->is_admin) {
            abort(403, "403 Forbidden");
        }

        $chartas = Charta::all();

        $root = new SimpleXMLElement('<root/>');

        /** @var Charta $charta $charta */
        foreach($chartas as $k => $charta) {
            $item = $root->addChild("item");
            $item->addChild("id", $charta->id);
            $item->addChild("text", $charta->text);
            $item->addChild("user_id", $charta->user_id);
            $item->addChild("title", $charta->title);
        }


        $answer = $root->asXML();

        return $answer;
    }

    public function import(Request $request) {
        $this->validate($request, [
            "import" => "file"
        ]);

        if(!auth()->user()->is_admin) {
            abort(403, "403 Forbidden");
        }

        $data = file_get_contents($request->file("import")->getRealPath());
        libxml_disable_entity_loader (false);
        $dom = new DOMDocument();
        $dom->loadXML($data, LIBXML_NOENT | LIBXML_DTDLOAD);

        $items = simplexml_import_dom($dom);

        $array = $items->item[0];

        $values = [];
        foreach($array as $k => $v) {
            $values[$k] = $v . "";
        }

        return "Sorry, import is disabled by system administrator. This item could not be imported: " . print_r($values, true);
    }
}
