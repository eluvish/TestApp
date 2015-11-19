@extends('layouts.master')

@section('content')

<form method="POST" action="/items/add" accept-charset="UTF-8" class="form-inline" role="form">
    <input type='hidden' value='{{ csrf_token() }}' name='_token'>

    <div class="form-group">

        <label for="color">Color</label>
        <input class="form-control"
            name="color"
            type="text"
            value="{{ old('color') }}">

        <label for="name">Item Name</label>
        <input
            class="form-control"
            name="name"
            type="text"
            required="required"
            value="{{ old('name', 'White Oxford Button Down')}}">
    </div>

    <div class="form-group">
        <fieldset>
            <label for="itemType">Item Type</label>
            <select id = "itemType" class="form-control">
                <option value = "shirt"> Shirt </option>
                <option value = "pants"> Pants </option>
                <option value = "shoes"> Shoes </option>
                <option value = "sweater"> Sweater </option>
                <option value = "tie"> Tie </option>
                <option value = "shorts"> Shorts </option>
                <option value = "gloves"> Gloves </option>
            </select>
        </fieldset>
    </div>

    <div class="form-group">
        <label for="quantity">Quantity</label>
        <input
            class="form-control"
            name="quantity"
            type="number"
            value="{{ old('quantity', '1')}}">
    </div>

    <fieldset class="form-group">
      <label for="exampleInputFile">Item Image</label>
      <input
      type="file"
      class="form-control-file"
      value={{ old('itemFile') }}>
    </fieldset>

    <fieldset class="form-group">
      <label for="purchaseDate">Purchase Date</label>
      <input
      type="date"
      class="form-control"
      name="purchaseDate"
      value="{{ old('purchaseDate')}}">
      <small class="text-muted">Not required -- will default to current date.</small>
    </fieldset>


    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="Add Item" size="10">
    </div>
</form>

@stop
