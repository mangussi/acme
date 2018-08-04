@extends('base')

@section('title', 'Acme | Testimonial')

@section('content')

<h1>Add Testimonial</h1>
<hr>

<!-- <form class="form" role="form" method="post" action="/add-testimonial" > -->
<form
  id="testimonialform"
  name="testimonialform"
  class="form-horizontal"
  action="/add-testimonial"
  method="post"
>

  <div class="form-group">
    <label
      for="title"
      class="col-sm-2 control-label"
    >Title</label>
      <div class="col-sm-10">
        <!-- <span class="input-group-addon"><i class="fa fa-font fa-fw"></i></span> -->
        <input
          class="form-control required"
          type="text"
          name="title"
          id="title"
          placeholder="Title"
        >
      </div>
  </div>

  <div class="form-group">
    <label
      for="testimonial"
      class="col-sm-2 control-label"
    >Testimonial</label>
      <div class="col-sm-10">
        <!-- <span class="input-group-addon"><i class="fa fa-font fa-fw"></i></span> -->
        <input
          class="form-control required"
          type="text"
          name="testimonial"
          id="testimonial"
          placeholder="Testimonial"
        >
      </div>
  </div>

  <hr>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input
        type="submit"
        class="btn btn-primary"
        value="Save Testimonial"
      >
    </div>
  </div>
  </form>
  @endsection

  @section('bottomjs')

  <script>
    $(document).ready(function() {
      $("#testimonialform").validate({
        rules: {
          title: {
            required: true
          },
          testimonial: {
            required: true
          }
        }
      });
    })
  </script>

  @endsection
