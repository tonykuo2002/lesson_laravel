<?php

namespace App\Http\Controllers;

use App\post;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    private $postModel;

    public function __construct(post $post)
    {
        $this->postModel = $post;
    }

    // index
    public function index(Request $request)
    {
//        $this->postModel->create(
//            [
//                'content' => 'John',
//                'active'  => 1
//            ]
//        );

//        dd($request->user()->posts);
        $datas = $request->user()->posts;
        $datas = $datas->toArray();

        return Excel::create('test', function($excel) use ($datas) {

            // Set the title
            $excel->setTitle('Our new awesome title');

            // Chain the setters
            $excel->setCreator('Maatwebsite')
                ->setCompany('Maatwebsite');

            // Call them separately
            $excel->setDescription('A demonstration to change the file properties');

            $excel->sheet('sheet1', function ($sheet) use ($datas) {
                $sheet->fromArray($datas);
            });

        })->export('xls');

    }

    //dd() to do dump and exit
}
