@extends('layouts.app')

@section('title', 'Strona główna')

@section('content')
    {{--action=" {{ route('search') }} "--}}
    <form class="typeahead" role="search" >
        <div class="form-group">
            <input style='width: 200px' type="search" name="q" id="search-input" class="form-control" placeholder="Search" autocomplete="off">
        </div>
    </form>
    <hr>

    <a class="btn btn-primary" href="{{ route('userArtists.index') }}">Artyści</a>
    <a class="btn btn-primary" href="{{ route('userAlbums.index') }}">Albumy</a>
    {{--<a class="btn btn-primary" href="{{ route('discountCodes.index') }}">Kody rabatowe</a>--}}
    {{--<a class="btn btn-primary" href="{{ route('userManagementPanel.index') }}">Zarządzanie użytkownikami</a>--}}


@endsection

@section('scripts')
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins and Typeahead) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- Typeahead.js Bundle -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/1.1.1/typeahead.bundle.min.js"></script>

    <script>
//        document.write("adasd");

        jQuery(document).ready(function($) {
            // Set the Options for "Bloodhound" suggestion engine
//            document.write("adasd");
            var engine = new Bloodhound({
                remote: {
                    url: '/find?q=%QUERY%',
                    wildcard: '%QUERY%'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });

            //engine.initialize()

            $("#search-input").typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            }, {
                source: engine.ttAdapter(),

                // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
                name: 'osoba',
                displayKey: 'email',
//                displayKey: 'q',

                // the key from the array we want to display (name,id,email,etc...)
                templates: {
                    empty: [
                        '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown">'
                    ],
                    suggestion: function (data) {
                        //data.osoba = undefined;
                        {{--{{ $data = data; }}--}}
                        {{--{{route('userArtists.details', $data)}}--}}

                        return '<a href="userArtists/' + data.id  + '" class="list-group-item">' + data.nazwa + ' -<b> ' + data.klasa +  '</b> </a>'
                    }
                }
            });
        });
    </script>
@endsection
