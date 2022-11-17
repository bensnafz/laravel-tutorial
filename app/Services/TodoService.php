<?php

namespace App\Services;
//****** */
use App\Models\Todo;

class TodoService
{
    public function getAll($search = "", $skip = 0, $limit = 10)
    {
        return Todo::query()
                ->when($search, function (Builder $query) use($search){
                    return $query->when('description', "LIKE", "%".$search."%");
                })
                ->when($skip, function(Builder $query) use($skip){
                    return $query->skip($skip);
                })
                ->limit($limit)
                ->get();
    }

    public function create($description)
    {
        return Todo::create([
            'description' => $description,
        ]);
    }

    public function getByID($id)
    {
        return Todo::where('id',$id)->firstOrFail();
    }

    public function update($id, $description)
    {
        //primary key
        //Todo::where('id',$id)-firstOrFail(); **
        // $todo = Todo::findOrFail($id);
        $todo = Todo::where('id',$id)->firstOrFail();
        $todo->update([
                'description' => $description
            ]);
        return $todo;
    }

    public function destroy($id)
    {
        //$todo = Todo::where('id',$id)->firstOrFail(); {Same..}
        return Todo::findOrFail($id)->delete();
    }


}

?>
