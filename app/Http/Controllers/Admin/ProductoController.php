<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Prestashop;
use Protechstudio\PrestashopWebService\PrestashopWebService;
use Protechstudio\PrestashopWebService\PrestaShopWebserviceException;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $urlProdu['resource'] = 'products/?sort=[id_ASC]&display=full'; //pasamos los parametros por url de la apí
        $xmlProdu = Prestashop::get($urlProdu); //llama los parametros por GET

        $urlStock['resource'] = 'stock_availables/?sort=[id_ASC]&display=full';
        $xmlStock = Prestashop::get($urlStock);

        $urlCateg['resource'] = 'categories/?sort=[id_ASC]&display=[name,products[id]]';
        $xmlCateg = Prestashop::get($urlCateg);

        $jsonProdu = json_encode($xmlProdu);    //codificamos el xml de la api en json
        $arrayProdu = json_decode($jsonProdu, true);  //decodificamos el json anterior para poder manipularlos

        $jsonStock = json_encode($xmlStock);
        $arrayStock = json_decode($jsonStock, true);

        $jsonCateg = json_encode($xmlCateg);
        $arrayCateg = json_decode($jsonCateg, true);

        foreach($arrayCateg["categories"]["category"] as $index => $categ) {
        // $products[] = $categ["associations"]["products"];
            foreach($categ["associations"]["products"] as $product) {
                $tab[] = $product;
            }
        }
        
        foreach($arrayProdu['products']['product'] as $key => $value) {

            foreach($arrayStock['stock_availables']['stock_available'] as $item => $valor) {

                if($value['id'] == $valor['id_product']) {

                    $tablaProdu[] = ['id'          => $value['id'],
                                    'name'        => $value['name']['language'],
                                    'stock'       => $valor['quantity'],
                                    'reference'   => $value['reference'],
                                    //'category'    => $valCateg['name']['language'], 
                                    'price'       => $value['price'],
                                    'state'       => $value['state'],
                                    'activo'      => $value['active'],
                                    ];
                }   
            }                              
        }

        //pasamos los parametros a otro arreglo para poder usarlos en el Front
        $parametros = ['productos' => $tablaProdu,];

        dd($tab);

        return view('admin.productos.index', compact('parametros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /*try{

            $urlProdu['resource'] = 'products/'+$id+'?sort=[id_ASC]&display=full'; //pasamos los parametros por url de la apí
            $xmlProdu = Prestashop::get($urlProdu);
            

        }catch(PrestaShopWebserviceException $e) {
            echo 'Error' . $e->getMessage();
        }*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
