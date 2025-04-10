using System;
using System.Collections.Generic;
using System.IO;
using System.Text.Json;
using StudentAdd;

public class DataManager
{
    private const string FilePath = "students.json";

    // Загрузка данных из файла
    public static List<Student> LoadData()
    {
        if (!File.Exists(FilePath))
            return new List<Student>();

        var json = File.ReadAllText(FilePath);
        return JsonSerializer.Deserialize<List<Student>>(json) ?? new List<Student>();
    }

    // Сохранение данных в файл
    public static void SaveData(List<Student> students)
    {
        var json = JsonSerializer.Serialize(students, new JsonSerializerOptions { WriteIndented = true });
        File.WriteAllText(FilePath, json);
    }
}