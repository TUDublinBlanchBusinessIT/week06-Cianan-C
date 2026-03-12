<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateScorderRequest;
use App\Http\Requests\UpdateScorderRequest;
use App\Repositories\ScorderRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Flash;
use Response;

class ScorderController extends AppBaseController
{
    /** @var ScorderRepository $scorderRepository*/
    private $scorderRepository;

    public function __construct(ScorderRepository $scorderRepo)
    {
        $this->scorderRepository = $scorderRepo;
    }

    /**
     * Display a listing of the Scorder.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $scorders = $this->scorderRepository->all();

        return view('scorders.index')
            ->with('scorders', $scorders);
    }

    public function checkout()
{
    if (Session::has('cart')) {
        $cart = Session::get('cart');
        $lineitems = array();

        foreach ($cart as $productid => $qty) {
            $lineitem['product'] = \App\Models\Product::find($productid);
            $lineitem['qty'] = $qty;
            $lineitems[] = $lineitem;
        }

        return view('scorders.checkout')->with('lineitems', $lineitems);
    } else {
        Flash::error('There are no items in your cart');
        return redirect(route('products.displaygrid'));
    }
}

public function placeorder(Request $request)
{
    $thisOrder = new \App\Models\Scorder();
    $thisOrder->orderdate = (new \DateTime())->format("Y-m-d H:i:s");
    $thisOrder->save();

    $orderID = $thisOrder->id;
    $productids = $request->productid;
    $quantities = $request->quantity;

    for ($i = 0; $i < sizeof($productids); $i++) {
        $thisOrderDetail = new \App\Models\Orderdetail();
        $thisOrderDetail->orderid = $orderID;
        $thisOrderDetail->productid = $productids[$i];
        $thisOrderDetail->quantity = $quantities[$i];
        $thisOrderDetail->save();
    }

    Session::forget('cart');
    Flash::success('Your Order has Been Placed');

    return redirect(route('products.displaygrid'));
}

    /**
     * Show the form for creating a new Scorder.
     *
     * @return Response
     */
    public function create()
    {
        return view('scorders.create');
    }

    /**
     * Store a newly created Scorder in storage.
     *
     * @param CreateScorderRequest $request
     *
     * @return Response
     */
    public function store(CreateScorderRequest $request)
    {
        $input = $request->all();

        $scorder = $this->scorderRepository->create($input);

        Flash::success('Scorder saved successfully.');

        return redirect(route('scorders.index'));
    }

    /**
     * Display the specified Scorder.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $scorder = $this->scorderRepository->find($id);

        if (empty($scorder)) {
            Flash::error('Scorder not found');

            return redirect(route('scorders.index'));
        }

        return view('scorders.show')->with('scorder', $scorder);
    }

    /**
     * Show the form for editing the specified Scorder.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $scorder = $this->scorderRepository->find($id);

        if (empty($scorder)) {
            Flash::error('Scorder not found');

            return redirect(route('scorders.index'));
        }

        return view('scorders.edit')->with('scorder', $scorder);
    }

    /**
     * Update the specified Scorder in storage.
     *
     * @param int $id
     * @param UpdateScorderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateScorderRequest $request)
    {
        $scorder = $this->scorderRepository->find($id);

        if (empty($scorder)) {
            Flash::error('Scorder not found');

            return redirect(route('scorders.index'));
        }

        $scorder = $this->scorderRepository->update($request->all(), $id);

        Flash::success('Scorder updated successfully.');

        return redirect(route('scorders.index'));
    }

    /**
     * Remove the specified Scorder from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $scorder = $this->scorderRepository->find($id);

        if (empty($scorder)) {
            Flash::error('Scorder not found');

            return redirect(route('scorders.index'));
        }

        $this->scorderRepository->delete($id);

        Flash::success('Scorder deleted successfully.');

        return redirect(route('scorders.index'));
    }
}
