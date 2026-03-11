<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderdetailRequest;
use App\Http\Requests\UpdateOrderdetailRequest;
use App\Repositories\OrderdetailRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class OrderdetailController extends AppBaseController
{
    /** @var OrderdetailRepository $orderdetailRepository*/
    private $orderdetailRepository;

    public function __construct(OrderdetailRepository $orderdetailRepo)
    {
        $this->orderdetailRepository = $orderdetailRepo;
    }

    /**
     * Display a listing of the Orderdetail.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $orderdetails = $this->orderdetailRepository->all();

        return view('orderdetails.index')
            ->with('orderdetails', $orderdetails);
    }

    /**
     * Show the form for creating a new Orderdetail.
     *
     * @return Response
     */
    public function create()
    {
        return view('orderdetails.create');
    }

    /**
     * Store a newly created Orderdetail in storage.
     *
     * @param CreateOrderdetailRequest $request
     *
     * @return Response
     */
    public function store(CreateOrderdetailRequest $request)
    {
        $input = $request->all();

        $orderdetail = $this->orderdetailRepository->create($input);

        Flash::success('Orderdetail saved successfully.');

        return redirect(route('orderdetails.index'));
    }

    /**
     * Display the specified Orderdetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $orderdetail = $this->orderdetailRepository->find($id);

        if (empty($orderdetail)) {
            Flash::error('Orderdetail not found');

            return redirect(route('orderdetails.index'));
        }

        return view('orderdetails.show')->with('orderdetail', $orderdetail);
    }

    /**
     * Show the form for editing the specified Orderdetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $orderdetail = $this->orderdetailRepository->find($id);

        if (empty($orderdetail)) {
            Flash::error('Orderdetail not found');

            return redirect(route('orderdetails.index'));
        }

        return view('orderdetails.edit')->with('orderdetail', $orderdetail);
    }

    /**
     * Update the specified Orderdetail in storage.
     *
     * @param int $id
     * @param UpdateOrderdetailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrderdetailRequest $request)
    {
        $orderdetail = $this->orderdetailRepository->find($id);

        if (empty($orderdetail)) {
            Flash::error('Orderdetail not found');

            return redirect(route('orderdetails.index'));
        }

        $orderdetail = $this->orderdetailRepository->update($request->all(), $id);

        Flash::success('Orderdetail updated successfully.');

        return redirect(route('orderdetails.index'));
    }

    /**
     * Remove the specified Orderdetail from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $orderdetail = $this->orderdetailRepository->find($id);

        if (empty($orderdetail)) {
            Flash::error('Orderdetail not found');

            return redirect(route('orderdetails.index'));
        }

        $this->orderdetailRepository->delete($id);

        Flash::success('Orderdetail deleted successfully.');

        return redirect(route('orderdetails.index'));
    }
}
