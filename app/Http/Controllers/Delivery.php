<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\City;
use App\Province;
use App\Ward;
use App\Feeship;

class Delivery extends Controller
{
    public function updatefeeship(Request $request){
        $data = $request->all();
		$fee_ship = Feeship::find($data['feeship_id']);
		$fee_value = rtrim($data['fee_value'],'.');
		$fee_ship->fee_feeship = $fee_value;
		$fee_ship->save();
    }

    public function loadfeeship(){
        $feeship = Feeship::orderBy('fee_id','DESC')->get();
        $output =  '';
        $output .= '<div class="table-responsive">  
			<table class="table table-bordered">
				<thread> 
					<tr class="table-danger">
						<th>City</th>
						<th>Province</th> 
						<th>Ward</th>
						<th>Shipping Fee</th>
					</tr>  
				</thread>
				<tbody>
				';

				foreach($feeship as $key => $fee){

				$output.='
					<tr>
						<td>'.$fee->city->name.'</td>
						<td>'.$fee->province->name.'</td>
						<td>'.$fee->ward->name.'</td>
						<td contenteditable data-feeship_id="'.$fee->fee_id.'" class="fee_feeship_edit">'.number_format($fee->fee_feeship,0,',','.').'</td>
					</tr>
					';
				}

				$output.='		
				</tbody>
				</table></div>
				';

				echo $output;
    }

    public function delivery(Request $request){
        // if($request->ajax()){
        $data = $request->all();
        $fee_ship = new Feeship();
        $fee_ship->fee_matp = $data['city'];
        $fee_ship->fee_maqh = $data['province'];
        $fee_ship->fee_xaid = $data['ward'];
        $fee_ship->fee_feeship = $data['fee_ship'];
        $fee_ship->save();
        // }
    }

    public function insert_delivery(Request $request){
        $city = City::orderBy('matp','ASC')->get();
        return view('admin.Delivery.insert_delivery',compact('city'));
    }

    public function select_delivery(Request $request){
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action']=="city"){
                $select_province = Province::where('matp',$data['ma_id'])->orderBy('maqh','ASC')->get();
                $output .= '<option>--Select Province--</option>';
                foreach($select_province as $key => $province){
                    $output .= '<option value="'.$province->maqh.'">'.$province->name.'</option>';
                }
                // $output .= '<option value="'.$province->maqh.'">'.$province->name.'</option>';
            }else{
                $select_ward = Ward::where('maqh',$data['ma_id'])->orderBy('xaid','ASC')->get();
                $output .= '<option>--Select Ward--</option>';
                foreach($select_ward as $key => $ward){
                    $output .= '<option value="'.$ward->xaid.'">'.$ward->name.'</option>';
                }
            }
        }
        echo $output;
    }

}
