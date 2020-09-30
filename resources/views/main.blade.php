@extends('layouts.app')


@section('main')
<main class="container-main">
    <section class="panel">
        <header class="panel-header">
            <span class="panel-title">Matched Providers</span>
        </header>
        <div class="panel-body">
            <table class="datatable">
                <tr>
                    <th>
                        Type
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Phone
                    </th>
                    <th>
                        ID
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        <!-- Action -->
                    </th>
                </tr>
                @foreach($providers as $provider)
                    <tr>
                        <td class="type-column">
                            <img alt="{{$provider->is_contracted_name}}" src="{{asset('icons/' . $provider->is_contracted_icon)}}">
                            <img alt="{{$provider->type->name}}" src="{{asset('icons/' . $provider->type->icon)}}">
                        </td>
                        <td class="name-column">
                            {{$provider->name}}
                        </td>
                        <td>
                            {{$provider->email}}
                        </td>
                        <td>
                            {{$provider->phone}}
                        </td>
                        <td>
                            {{$provider->code}}
                        </td>
                        <td class="type-column">
                            <img alt="{{$provider->status->name}}" src="{{asset('icons/' . $provider->status->icon)}}">
                            {{$provider->status->name}}
                        </td>
                        <td class="actions-column">
                            <button class="btn chat-button">CHAT</button>
                            <button class="btn call-button" onclick="call({{$provider->rawPhone}})">CALL</button>
                            <button class="options-button"></button>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </section>
</main>
@endsection
