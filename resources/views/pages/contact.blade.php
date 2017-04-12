@extends('main')

@section('title',' | Contact')

@section('content')
        <div class="row">
            <div class="col-md-12">
                <h1>Contact Me</h1>
                <hr>
                <form action="">
                    <div class="form-group">
                        <label for="" name="email">Email:</label>
                        <input type="text" id="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" name="subject">Subject:</label>
                        <input type="text" id="subject" name="subject" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" name="message">Message:</label>
                        <textarea name="message" placeholder="Type your message here..." class="form-control" id="message" cols="30" rows="10"></textarea>
                    </div>

                    <input type="submit" name="" value="Send Message" class="btn btn-success">
                </form>
            </div>
        </div>
  @endsection