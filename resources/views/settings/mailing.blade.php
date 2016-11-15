@extends('layouts.app')

@section('content')

    <div class="col-md-8">

        <h1 class="mb-35">Mailing</h1>

        <ul class="bordered-menu">
            <li class="bordered-menu__item">
                <a href="{{ url('settings/info') }}">About myself</a>
            </li>
            <li class="bordered-menu__item bordered-menu__item--active">Mailing</li>
        </ul>

        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Email for notifications</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
            </div>

            <div class="checkbox">
                <label>
                    <input type="checkbox"> Send notifications when question is answered
                </label>
            </div>

            <div class="checkbox">
                <label>
                    <input type="checkbox"> News about the service(every week)
                </label>
            </div>

            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>

@endsection