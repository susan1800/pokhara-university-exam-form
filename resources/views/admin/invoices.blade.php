<style>
    td,th{
        text-align: center;
        margin:auto;
        padding:auto;

    }
    </style>
<table border="1">
    <tr>
        <th colspan="4" style="text-align:center; padding:auto;margin:auto; background:#bfbfbfbf;"><h2>Pokhara University</h2></th>
        <th rowspan="5">Subject Name</th>
        @foreach ($subjects as $subject)

        <th rowspan="4">{{$subject->subject}}</th>

        @endforeach

    </tr>

    <tr>
        <th colspan="4" style="text-align:center; padding:auto;margin:auto; background:#bfbfbfbf;">Office of the Controller of Examinations</th>
    </tr>
    <tr>
        <th colspan="4" style="text-align:center; padding:auto;margin:auto; background:#bfbfbfbf;">Fall Semester 2021_22</th>
    </tr>
    <tr>
        <th colspan="4" style="text-align:center; padding:auto;margin:auto; background:#bfbfbfbf;"><h1>COSMOS COLLEGE</h1></th>
    </tr>
    <tr>
        <th colspan="4" style="text-align:center; padding:auto;margin:auto; background:#bfbfbfbf;">{{$program}}({{$level}})</th>
        @foreach ($subjects as $subject)

        <th>{{$subject->subject_code}}</th>

        @endforeach
    </tr>
    <tr>
        <th colspan="4" style=""></th>
        <th></th>
        <th colspan="{{count($subjects)}}"></th>

    </tr>
    <tr>
        <th>SN</th>
        <th>Exam Roll Nuber</th>
        <th>CRN</th>
        <th>Name</th>
        <th>Registration Number</th>
        <th colspan="{{count($subjects)}}">Regular</th>
    </tr>
    @php
        $SN=0;
    @endphp
    @foreach ($formdatas as $formdata)
    @php
            $totalsubject = [];

        @endphp
    @foreach ($formdata->subject as $regular)

        @php
            array_push($totalsubject,$regular->subject_id)
        @endphp

    @endforeach
    @foreach ($formdata->backsubject as $back)

        @php
            array_push($totalsubject,$back->subject_id)
        @endphp

    @endforeach


    @php
        array_unique($totalsubject);
        ksort($totalsubject)

    @endphp
    {{-- @if (in_array("100", $totalsubject)) --}}
    @php
            $match=0;
        @endphp
    @foreach ($subjects as $subject)

        @foreach ($totalsubject as $abc)
            @if($abc==$subject->id)
            @php
                $match = 1;
                $SN++;
                break;
            @endphp
            @endif
        @endforeach
        @if($match == 1)
        @break;
        @endif
    @endforeach
    @if($match == 1)


    <tr>
        <td>{{$SN}} </td>
        <td>{{$formdata->exam_roll_no}} </td>
        <td></td>
        <td>{{$formdata->userdetail->name}} </td>
        <td>{{$formdata->userdetail->registration_number}} </td>

        @foreach ($subjects as $subject)
        @php
            $i=0;
        @endphp
        @foreach ($totalsubject as $abc)

            @if($abc ==$subject->id)
                <td>1</td>
                @php
                    $i=1;
                    break;
                @endphp
            @endif
        @endforeach
        @if ($i==0)
        <td></td>

        @endif
        @endforeach
    </tr>
    @endif
    @endforeach
</table>
