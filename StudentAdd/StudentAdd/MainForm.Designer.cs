using System;
using System.Collections.Generic;
using System.Linq;
using System.Windows.Forms;
using StudentAdd;

public partial class MainForm : Form
{
    private List<Student> students = new List<Student>();
    private BindingSource bindingSource = new BindingSource();

    public MainForm()
    {
        InitializeUI();
        LoadData();
    }

    private void InitializeUI()
    {
        // Настройка формы
        this.Text = "Управление студентами";
        this.Size = new System.Drawing.Size(800, 600);

        // Текстовые поля для ввода данных
        var firstNameLabel = new Label { Text = "Имя:", Location = new System.Drawing.Point(10, 10) };
        var firstNameTextBox = new TextBox { Location = new System.Drawing.Point(100, 10), Width = 150 };

        var addButton = new Button { Text = "Добавить", Location = new System.Drawing.Point(10, 130), Width = 100 };

        // Таблица студентов
        var dataGridView = new DataGridView
        {
            Location = new System.Drawing.Point(10, 170),
            Size = new System.Drawing.Size(760, 200),
            AutoGenerateColumns = true,
            ReadOnly = true
        };

        // Привязка данных к таблице
        bindingSource.DataSource = students;
        dataGridView.DataSource = bindingSource;

        // Обработчики событий
        addButton.Click += (sender, e) =>
        {
            var student = new Student
            {
                Id = students.Count > 0 ? students.Max(s => s.Id) + 1 : 1,
                FirstName = firstNameTextBox.Text
            };
            students.Add(student);
            bindingSource.ResetBindings(false);
        };

        // Добавление элементов на форму
        this.Controls.Add(firstNameLabel);
        this.Controls.Add(firstNameTextBox);
        this.Controls.Add(addButton);
        this.Controls.Add(dataGridView);
    }

    private void LoadData()
    {
        students = DataManager.LoadData();
        bindingSource.ResetBindings(false);
    }
}