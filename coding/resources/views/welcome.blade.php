@if ($errors->any())
<div class = "alert alert-danger">
   <span style="color:#FF0000">
      @foreach ($errors->all() as $error)
      <p> {{ $error }}</p>
      @endforeach
   </span>
</div>
@endif  
<!DOCTYPE html>
<html lang = "en">
   <head>
      <meta charset="UTF-8">
      <title>Test </title>
      <style>
         .button {
         background-color: #762772;
         border: none;
         color: white;
         padding: 15px 32px;
         text-align: center;
         text-decoration: none;
         display: inline-block;
         font-size: 16px;
         margin: 4px 2px;
         cursor: pointer;
         }
         a:link {
         color: red;
         }
         /* visited link */
         a:visited {
         color: purple;
         }
         /* mouse over link */
         a:hover {
         color: blue;
         }
         /* selected link */
         a:active {
         color:green;
         }
         h1 {
         text-shadow: 0 0 3px #FF0000, 0 0 5px #0000FF;
         }
      </style>
   </head>
   <body bgcolor = EAD4CF>
      <table>
         <h1 align = "center">User Form </h1>
         <form action="store" method="POST"  autocomplete="off">
            <tr>
               <th>Name</th>
               <td><input type ="text" name = "name" id = "name"  value="{{ old('name') }}" required/></td>
            </tr>
            <tr>
               <th>Email </th>
               <td><input type ="email" name = "email" id = "email" autocomplete='off' value="{{ old('email') }}" required/></td>
            </tr>
            <tr>
               <th>Password </th>
               <td><input type ="password" name = "password" autocomplete='on' id = "password" value="{{ old('password') }}" required/></td>
            </tr>
            <tr>
               <th>Mobile </th>
               <td><input type ="tel" name = "mobile" id = "mobile" value="{{ old('mobile') }}" required/></td>
            </tr>
            <tr>
               <th>Gender </th>
               <td>
                  <input type="radio" 
                  @if(old('gender') == "male") 
                  checked
                  @endif name="gender" value="male" required/> Male<br>
                  <input type="radio" 
                  @if(old('gender') == "female")
                  checked
                  @endif name="gender" value="female" required/> Female<br>
               </td>
            </tr>
            <tr>
               <th>Interests </th>
               <td><input type="checkbox"  
                  {{ (is_array(old('interests')) && in_array('Dancing', old('interests'))) ? 'checked' : '' }}
                  name="interests[]" value="Dancing">Dancing<br>
                  <input type="checkbox"  
                  {{ (is_array(old('interests')) && in_array('Singing', old('interests'))) ? 'checked' : '' }}
                  name="interests[]" value="Singing">Singing  
               </td>
            </tr>
            <tr>
               <th>City </th>
               <td>
                  <select name = "city" value ="{{ old('city') }}" required/>
                     <option selected disabled>Select</option>
                     <option @if(old('city') == "mangalore") 
                     selected
                     @endif value="mangalore" required/>Mangalore</option>
                     <option @if(old('city') == "bangalore") 
                     selected
                     @endif value="bangalore" required/>Bangalore</option>
                     <option @if(old('city') == "gulbarga") 
                     selected
                     @endif value="gulbarga" required>Gulbarga   </option>
                     <option @if(old('city') == "udupi") 
                     selected
                     @endif value="udupi" required/>Udupi</option>
                  </select>
               </td>
            </tr>
            <tr>
               <th>Location Priority</th>
               <td>
                  <select  name = "location_priority[]" value ="{{ old('location_priority') }}" multiple>
                     <option selected disabled>Select</option>
                     <option {{ (is_array(old('location_priority')) && in_array('DairyCircle', old('location_priority'))) ? 'selected' : '' }}
                     value="DairyCircle" required/>Dairy Circle</option>
                     <option {{ (is_array(old('location_priority')) && in_array('Kormangala', old('location_priority'))) ? 'selected' : '' }}
                     value="Kormangala" required/>Kormangala</option>
                     <option {{ (is_array(old('location_priority')) && in_array('BTM', old('location_priority'))) ? 'selected' : '' }}
                     value="BTM" required>BTM   </option>
                     <option {{ (is_array(old('location_priority')) && in_array('jayanagar', old('location_priority'))) ? 'selected' : '' }}
                     value="jayanagar" required/>jayanagar</option>
                  </select>
               </td>
            </tr>
            <input type ="hidden" name ="_token" value="{{ csrf_token() }}">
      </table>
      <p align = "center"><input type ="submit" name = "submit"  class = "button" id = "submit" value = "Insert"></p>
      <p align = "center"><strong><a href ="/">Click here to view the records..! </a></strong></p>
      </form>
   </body>
</html>