 $.ajax("/~" + eid + "/ct310/index.php/federation/attraction/"+obj.id, {
   success: function(attr)
   {
     $.each(JSON.parse(attr), function(idx1, obj1)
     {
      var id1 = obj1.id;
       var name1 = obj1.name;
      var state1 = obj1.state;
       var  desc1= obj1.desc;
     }
   }
 });
