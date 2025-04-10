using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace StudentAdd
{
    public class Student
    {
        public int Id { get; set; }
        public string FirstName { get; set; }
        public string LastName { get; set; }
        public string Group { get; set; }
        public int Course { get; set; }
        public string BirthDate { get; set; } // DD.MM.YYYY
        public string Email { get; set; }
        public string Phone { get; set; }
    }
}
