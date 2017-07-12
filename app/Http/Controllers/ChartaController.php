<?php

namespace App\Http\Controllers;

use App\Charta;
use App\ChartaSign;
use DB;
use Illuminate\Http\Request;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;

class ChartaController extends Controller
{
    public function list() {
        return view("chartas", [
            "chartas" => Charta::all()
        ]);
    }

    public function get(Charta $charta) {
        return view("charta", [
            "charta" => $charta
        ]);
    }

    public function create() {
        if(request()->method() == "GET")
            return view("charta_create");
        elseif(request()->method() == "POST") {
            $this->validate(request(), [
                "title" => "string|min:3|max:200",
                "text" => "string|min:10|max:5000"
            ]);

            Charta::create([
                "title" => request("title"),
                "text" => str_replace("&lt;", "<",
                          str_replace("&gt;", ">",
                    strip_tags(request("text")))),
                "user_id" => auth()->id()
            ]);

            return redirect("/home");
        } else {
            throw new MethodNotAllowedException(["GET", "POST"]);
        }
    }

    public function sign(Charta $charta) {
        $charta->signs()->create([
            "user_id" => auth()->id()
        ]);

        return redirect()->back();
    }

    public function report(Charta $charta) {
        $this->validate(request(), [
            "text" => "string|required|max:5000",
            "name" => "string|nullable"
        ]);

        $name = request("name");
        $encrypted_name = "";
        if($name) {
            $encryption_key = config("app.encryption_key");

            while (strlen($encryption_key) < strlen($name))
                $encryption_key .= $encryption_key;

            for ($i = 0; $i < strlen($name); $i++)
                $encrypted_name .= $name[$i] ^ $encryption_key[$i];
        }

        $text = addslashes(request("text"));

        DB::raw(
            "INSERT INTO reports VALUES (0, {$charta->id}, '$encrypted_name', '$text', NOW(), NOW());"
        );

        return redirect()->back();
    }
}
