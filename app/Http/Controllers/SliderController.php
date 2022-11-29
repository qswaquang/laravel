<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use App\Models\Slider;
use App\Repositories\SliderRepositoryInterface;

class SliderController extends Controller
{
    protected $sliderRepo;
    public function __construct(SliderRepositoryInterface $sliderRepo)
    {
        $this->sliderRepo = $sliderRepo;
    }

    public function index()
    {
        $sliders = $this->sliderRepo->getSliders();
        return view('slider-list', ['sliders' => $sliders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slider-form')->with(['editmode' => false]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSliderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSliderRequest $request)
    {
        if($request->hasFile('picture')) {
            $pathStore = '/sliders';

            //get filename with extension
            $filenamewithextension = $request->file('picture')->getClientOriginalName();

            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('picture')->getClientOriginalExtension();
      
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            $request->file('picture')->storeAs('public'.$pathStore, $filenametostore);

            $slider = $request->all();
            $slider['picture'] = '/storage'.$pathStore.'/'.$filenametostore;

            $this->sliderRepo->create($slider);
        }
        return redirect()->route('admin.sliders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        
    }

    public function edit(Slider $slider)
    {
        return view('slider-form')->with(['editmode' => true, 'slider' => $slider]);
    }

    public function update(UpdateSliderRequest $request, $id)
    {
        $this->sliderRepo->update($request->all(), $id);
        return redirect()->route('admin.sliders.index');
    }


    public function destroy($id)
    {
        $this->sliderRepo->delete($id);
        return redirect()->route('admin.sliders.index');
    }
}
