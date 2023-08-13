import React from 'react';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';
import Semester from './pages/semester/semester';
import Course from './pages/course/course';
import Student from './pages/student/student';
import Teacher from './pages/teacher/teacher';
import Attendance from './pages/attendance/attendance';
import Login from './pages/login/login';
import Clazz from './pages/clazz/clazz';
import CreateStudentPage from './components/student/CreateStudentPage'
import CreateTeacherPage from './components/teacher/CreateTeacherPage'
import CreateCoursePage from './components/course/CreateCoursePage';
import CreateClazzPage from './components/clazz/CreateClazzPage';
import AttendanceClassTeacher from './pages/attendance/attendanceclassteacher';
import AttendanceDate from './pages/attendance/attendancedate';
import AttendanceStudentList from './pages/attendance/attendancestudentlist';
function App() {
  return (
    <Router>
      <div>
        <Routes>
          <Route path="/" element={<Login />} />
          <Route path="/login" element={<Login />} />
          <Route path="/semester" element={<Semester />} />
          <Route path="/course" element={<Course />} />
          <Route path="/student" element={<Student />} />
          <Route path="/teacher" element={<Teacher />} />
          <Route path="/class" element={<Clazz />} />
          <Route path="/attendance" element={<Attendance />} />
          <Route path="/student/create" element={<CreateStudentPage/>}/>
          <Route path="/teacher/create" element={<CreateTeacherPage/>}/>
          <Route path="/course/create" element={<CreateCoursePage/>}/>
          <Route path="class/create" element={<CreateClazzPage/>}/>
          <Route path="attendance/list/:id" element={<AttendanceClassTeacher/>}/>
          <Route path="attendance/list/:id/:clazzCode" element={<AttendanceDate/>}/>
          <Route path="attendance/list/:id/:clazzCode/:attendanceDate" element={<AttendanceStudentList/>}/>
        </Routes>
      </div>
    </Router>
  );
}

export default App;
