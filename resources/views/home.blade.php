@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Home') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h5>Assalamualaikum,  <strong> {{ Auth::user()->name }} </strong></h5>
                    <h6>Your Isssued Book list is Here.. Please Return your books before <strong>Return Date</strong></h6>
                    <table class="table table-bordered text-center">
                        <tr>
                            <th>No</th>
                            <th>Book Name</th>
                            <th>Issue Date</th>
                            <th>Return Date</th>
                            <th>Remaning Days</th>
                            {{-- <th>Days Left</th> --}}
                        </tr>
                        @foreach ($rents as $rent)
                        @if (Auth::user()->id == $rent->user_id)
                            <tr>
                                <td> {{ ++$i }} </td>
                                <td> {{ $rent->book->name }} </td>
                                <td> {{ date('d-m-Y', strtotime($rent->issue_date )) }} </td>
                                <td>

                                    {{ date('d-m-Y', strtotime($rent->return_date )) }}
                                </td>
                                <td>
                                    @if ($rent->is_return == 1)
                                       <strong style="color:green">Already Returned</strong>
                                    @else
                                    <strong style="color:red">{{ date_diff(new \DateTime($rent->return_date), new \DateTime())->format("%y Years, %m Months, %d days"); }}</strong>
                                    @endif
                                </td>
                                {{-- <td>
                                     {{ date_diff(new \DateTime($rent->return_date), new \DateTime())->format("%m Months, %d days"); }}
                                </td> --}}
                            </tr>
                        @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function timeDiffCalc(dateFuture, dateNow) {
    let diffInMilliSeconds = Math.abs(dateFuture - dateNow) / 1000;

    // calculate days
    const days = Math.floor(diffInMilliSeconds / 86400);
    diffInMilliSeconds -= days * 86400;
    console.log('calculated days', days);
    let difference = '';
    if (days > 0) {
      difference += (days === 1) ? `${days} day, ` : `${days} days, `;
    }
    return difference;
    }

    console.log(timeDiffCalc(new Date('2019/10/1 04:10:00'), new Date('2019/12/2 18:20:00')));
</script>
@endsection
