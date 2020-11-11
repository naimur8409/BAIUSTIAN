<!DOCTYPE html>
<html lang="en">
<head>
  <title>BAIUSTIAN || My Result</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="conatiner mt-4">
    <div class="text-center" data-view="print"><span class="m-auto"></span>
        <button class="btn btn-primary " onclick="window.print()">Download Result</button>
    </div>
</div>
<div class="container" id="myTabContent">
  <table class="table table-bordered" >
    <thead>
      <tr>
        <th scope="col">Course Code</th>
        <th scope="col">Course Name</th>
        <th scope="col">Credit</th>
        <th scope="col">Taken By</th>
        <th scope="col">GPA</th>
        <th scope="col">Retake</th>
        <th scope="col">Back Log</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($results as $i=> $data)
            @if($i==0)
                <strong style="float: left" class="mb-2">Level-Term: {{ $lt->levelterm }}</strong>
                <strong style="float: right">GPA: {{ $gpa }}</strong>
             @endif
            <tr>
                <td>{{ $data->course->c_code }}</td>
                <td>{{ $data->course->name }}</td>
                <td>{{ $data->course->credit }}</td>
                <td>{{ $data->faculty->name }}</td>
                <td>@if($data->gpa == 0)Fail @endif @if($data->gpa != 0){{ $data->gpa }} @endif</td>
                <td>@if($data->retake == 0)No @endif @if($data->retake == 1)Yes @endif</td>
                <td>@if($data->backlog == 0)No @endif @if($data->backlog == 1)Yes @endif</td>

            </tr>
        @endforeach

    </tbody>

  </table>

  <strong class="">Total Credit: {{ $t_credit }}</strong>
</div>



</body>
</html>

