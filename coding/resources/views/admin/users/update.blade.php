@if ($errors->any())
<div class = "alert alert-danger">
   @foreach ($errors->all() as $error)
   <p> {{ $error }}</p>
   @endforeach
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
    padding: 15px 15px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
h1 {
    text-shadow: 0 0 3px #FF0000, 0 0 5px #0000FF;
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
    color:  blue;
}

/* selected link */
a:active {
    color:green;
}
</style>
   </head>
   <body bgcolor=EAD4CF>
    <strong>  <a href = "/"> Go back </a></strong>
      <table>
         <form action= "/update/{{ $value->id }}" method="POST">
            <h1 align = "center">Updating Records </h1>
            <tr>
               <th>Name</th>
               <td><input type ="text" name = "name" id = "name" value ="{{ $value->name }}" required/></td>
            </tr>
            <tr>
               <th>Email </th>
               <td><input type ="email" name = "email" id = "email"  value ="{{ $value->email }}" required/></td>
            </tr>
            <tr>
               <th>Password </th>
               <td><input type ="password" name = "password" id = "password" value ="{{ $value->password }}" required/></td>
            </tr>
            <tr>
               <th>Mobile </th>
               <td><input type ="tel" name = "mobile" id = "mobile"  value = "{{ $value->mobile }}" required/></td>
            </tr>
            <tr>
               <th>Gender </th>
               <td>
                  <input type="radio" 
                  @if($value->gender == "male") 
                  {{'checked'}} 
                  @endif
                  name="gender" value="male" required/> Male<br>
                  <input type="radio" 
                  @if($value->gender == "female")
                  {{'checked'}} 
                  @endif
                  name="gender" value="female" required/> Female<br>
               </td>
            </tr>
            
             <tr><th>Interests </th><td>

             <?php   $interestArray = explode(',', $value->interests); ?>
             <!-- {{ (is_array($interestArray) && in_array('Singing', $interestArray)) ? 'checked' : 'test' }} 
            {{dump($interestArray)}}
             -->
             
               <input type="checkbox"  
                 {{ (is_array($interestArray) && in_array('Dancing', $interestArray)) ? 'checked' : '' }}  
                 name="interests[]" value="Dancing">Dancing<br>
               <input type="checkbox"  
                  {{ (is_array($interestArray) && in_array('Singing', $interestArray)) ? 'checked' : '' }}
                 name="interests[]" value="Singing">Singing  </td></tr> 
            <tr>
               <th>City </th>
               <td>
                  <select name = "city" value ="{{ old('city') }}" required/>
                     <option >Select</option>
                     <option @if($value->city == "mangalore" ) 
                     {{'selected=selected'}}
                     @endif value="mangalore" >Mangalore</option>
                     <option @if($value->city == "bangalore") 
                     {{'selected=selected'}}
                     @endif value="bangalore" >Bangalore</option>
                     <option @if($value->city == "gulbarga") 
                     {{'selected=selected'}}
                     @endif value="gulbarga">Gulbarga   </option>
                     <option @if($value->city == "udupi") 
                     {{'selected=selected'}}
                     @endif value="udupi" >Udupi</option>
                  </select>
               </td>
            </tr>
            <tr><th>Location Priority</th>
             <?php   $locationArray = explode(',', $value->location_priority); ?>
 <td>
<select  name = "location_priority[]" value ="{{ old('location_priority') }}" multiple>
<option selected disabled>Select</option>
<option {{ (is_array($locationArray) && in_array('DairyCircle',$locationArray)) ? 'selected' : '' }}
       value="DairyCircle" required/>Dairy Circle</option>
  <option {{ (is_array($locationArray) && in_array('Kormangala', $locationArray)) ? 'selected' : '' }}
        value="Kormangala" required/>Kormangala</option>
  <option {{ (is_array($locationArray) && in_array('BTM', $locationArray)) ? 'selected' : '' }}
         value="BTM" required>BTM   </option>
  <option {{ (is_array($locationArray) && in_array('jayanagar', $locationArray)) ? 'selected' : '' }}
       value="jayanagar" required/>jayanagar</option>
</select>
</td></tr> 
            <input type ="hidden" name ="_token" value="{{ csrf_token() }}">
      </table>
      <p align = "center"><input type ="submit" class = "button" name = "submit" id = "Update" value ="Update">
      </form>
   </body>
</html>

