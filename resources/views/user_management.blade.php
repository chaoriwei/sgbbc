@extends('layouts.app')

@section('content')
<?php
  $users = DB::table('users')->get();
?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">All BBC Users</div>

                <div class="panel-body">
                  @if (!Auth::guest() && Auth::user()->role=='admin')
                      <div class="container">
                        <div class="col-md-6">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                foreach ($users as $user) {
                                  echo "<tr>";
                                      echo "<td>".$user->name."</td>";
                                      echo "<td>".$user->email."</td>";
                                      echo "<td>".$user->role."</td>";
                                  echo "</tr>";
                                }
                              ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                  @else
                    No Authorization to view page
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
