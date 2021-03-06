@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('nalepke_kandidati/isci') }}">
        <div class="panel-group">
            {!! csrf_field() !!}
            <h4>Nalepke z naslovi kandidatov</h4>
            <div class="panel panel-default">
                <div class="panel-heading">Študijski program</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Fakulteta: </label>
                        <div class="col-md-6">
                            <select name="fakultete" class="form-control" id="vzdrzevanjeProgramov_fakultete">
                                <option selected value="0">Izberite visokošolski zavod.</option>
                                @foreach($fakultete as $fakulteta)
                                    @if($zavod == $fakulteta->id && Auth::user()->vloga == 'fakulteta')
                                        <option value="{{$fakulteta->id}}">{{$fakulteta->ime}}</option>
                                    @elseif($zavod == $fakulteta->id && Auth::user()->vloga == 'skrbnik')
                                        <option selected value="{{$fakulteta->id}}">{{$fakulteta->ime}}</option>
                                    @elseif(Auth::user()->vloga == 'skrbnik')
                                        <option value="{{$fakulteta->id}}">{{$fakulteta->ime}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Študijski program: </label>
                        <div class="col-md-6">
                            <select name="program" class="form-control" id="vzdrzevanjeProgramov_programi">
                                <option selected data-fakulteta="-1" value="0">Izberite program izbranega visokošolskega zavoda.</option>
                                @foreach($programi as $program)
                                    @if($prog == $program->id)
                                        <option selected data-fakulteta="{{ $program->id_zavoda }}"
                                            data-mesta="{{ $program->stevilo_vpisnih_mest }}" data-mesta_omejitev="{{ $program->stevilo_mest_po_omejitvi }}" data-omejitev="{{$program->omejitev_vpisa}}" data-stevilo_sprejetih="{{$program->stevilo_sprejetih}}"
                                            data-mesta_tujci="{{ $program->stevilo_vpisnih_mest_tujci }}" data-mesta_omejitev_tujci="{{ $program->stevilo_mest_po_omejitvi_tujci }}" data-omejitev_tujci="{{$program->omejitev_vpisa_tujci}}" data-stevilo_sprejetih_tujci="{{$program->stevilo_sprejetih_tujci}}"
                                            data-nacin="{{$program->nacin_studija}}" data-vrsta="{{$program->vrsta}}" value="{{$program->id}}" style="display:none">{{$program->ime}}, {{$program->nacin_studija}}</option>
                                    @else
                                        <option data-fakulteta="{{ $program->id_zavoda }}"
                                                data-mesta="{{ $program->stevilo_vpisnih_mest }}" data-mesta_omejitev="{{ $program->stevilo_mest_po_omejitvi }}" data-omejitev="{{$program->omejitev_vpisa}}" data-stevilo_sprejetih="{{$program->stevilo_sprejetih}}"
                                                data-mesta_tujci="{{ $program->stevilo_vpisnih_mest_tujci }}" data-mesta_omejitev_tujci="{{ $program->stevilo_mest_po_omejitvi_tujci }}" data-omejitev_tujci="{{$program->omejitev_vpisa_tujci}}" data-stevilo_sprejetih_tujci="{{$program->stevilo_sprejetih_tujci}}"
                                                data-nacin="{{$program->nacin_studija}}" data-vrsta="{{$program->vrsta}}" value="{{$program->id}}" style="display:none">{{$program->ime}}, {{$program->nacin_studija}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Način študija: </label>
                        <div class="col-md-6">
                            <select name="nacin_studija_kandidati" class="form-control" id="nacin_studija_kandidati">
                                <option selected value="">Izberite način študija.</option>
                                @if($nac == 'Redni' && $nac != 0)
                                    <option selected value="redni">Redni.</option>
                                    <option value="izredni">Izredni.</option>
                                @elseif($nac == 'Izredni' && $nac != 0)
                                    <option value="redni">Redni.</option>
                                    <option selected value="izredni">Izredni.</option>
                                @else
                                    <option value="redni">Redni.</option>
                                    <option value="izredni">Izredni.</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Način zaključka srednje šole: </label>
                        <div class="col-md-6">
                            <select name="zakljucek" class="form-control" id="nacin_zakljucka">
                                <option selected value="">Izberite način zaključka srednje šole.</option>
                                @if($zaklj == '2')
                                    <option selected value="splosna">Splošna matura.</option>
                                    <option value="poklicna">Poklicna matura.</option>
                                @elseif($zaklj == '3')
                                    <option value="splosna">Splošna matura.</option>
                                    <option selected value="poklicna">Poklicna matura.</option>
                                @else
                                    <option value="splosna">Splošna matura.</option>
                                    <option value="poklicna">Poklicna matura.</option>
                                @endif
                            </select>
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" name="isci" class="btn btn-primary pull-right">
                            <i class="fa fa-btn fa-sign-in"></i>Išči
                        </button>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" name="izvozi" class="btn btn-primary pull-right">
                            <i class="fa fa-btn fa-sign-in"></i>Izvozi nalepke
                        </button>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" name="izvozi_sprejeti" class="btn btn-primary pull-right">
                            <i class="fa fa-btn fa-sign-in"></i>Izvozi nalepke sprejetih kandidatov
                        </button>
                    </div>
                </div>
            </div>

            @if($prikaziSeznam)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="kandidati_seznam">
                                <thead>
                                <tr>
                                    <th>Emšo</th>
                                    <th>Ime in priimek kandidata</th>
                                    <th>Fakulteta in študijski program</th>
                                    <th>Naslov za pošiljanje</th>
                                    <th>Sprejet</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($prijave as $prijava)
                                        <tr>
                                            <td>{{$prijava->kandidat->emso}}</td>
                                            <td>{{$prijava->kandidat->ime.' '.$prijava->kandidat->priimek}}</td>
                                            <td>{{$prijava->studijskiProgram->visokosolskiZavod->ime}},<br>{{$prijava->studijskiProgram->ime.' ('.$prijava->zelja.'. želja)'}}</td>
                                            <td>{{($prijava->kandidat->naslovZaPosiljanje()->first()->naslov ?? '').', '.
                                                  ($prijava->kandidat->naslovZaPosiljanje()->first()->posta->postna_stevilka ?? '').' '.
                                                  ($prijava->kandidat->naslovZaPosiljanje()->first()->posta->ime ?? '').', '.
                                                  ($prijava->kandidat->naslovZaPosiljanje()->first()->drzava->ime ?? '')}}</td>
                                            <td>{{$prijava->sprejet == 1 ? 'Da' : 'Ne'}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif

        </div>
        </form>
        @include('flash_message')
    </div>
@endsection
