<aside class="main-sidebar" style="  background-color: #022730">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel --> 
      <div class="user-panel">
        <div class="pull-left image">
        <img src="assets/lte/dist/img/user1-128x128.jpg" class="img-circle" alt="User Image">
        </div> 
        <div class="pull-left info">
          <p><?=$this->renderSection('Nombre-aslide')?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Menu Navegacion</li>
        <li id="menu_usuarios" class="treeview"> <!--Usuarios inicio -->
          <a href="#">
            <i class="fa fa-user"></i> <span>Usuarios</span> 
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> Agregar</a></li>
            <li><a href="<?php base_url() ?>usuario" method="GET"><i class="fa fa-circle-o text-aqua"></i> Mostrar</a></li>
          </ul>
        </li> <!--Usuarios fin -->   
        <li id="menu_Notas" class="treeview"> <!--Notas inicio -->
          <a href="#">
            <i class="fa fa-file-text"></i> <span> Notas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> Ver Notas</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> Asignar Notas</a></li>
          </ul>
        </li> <!--Notas fin -->
        <li id="menu_Matriculas" class="treeview"> <!--Matricula inicio -->
          <a href="#">
            <i class="fa  fa-mortar-board"></i>
            <span>Matricula</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> Matricular</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> Mostrar</a></li>
          </ul>
        </li> <!--Matricula fin -->
        <li id="menu_Estudiantes" class="treeview"> <!--Matricula Estudiantes -->
          <a href="#">
            <i class="fa   fa-user-plus"></i>
            <span>Estudiantes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              <small class="label pull-right bg-green">Catalogo</small>            
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#" onclick="ingresar_estudiante();"><i class="fa fa-circle-o text-aqua"></i> Agregar</a></li>
            <li><a href="<?php base_url() ?>estudiantes" method="GET"><i class="fa fa-circle-o text-aqua"></i> Mostrar</a></li> 
          </ul>
        </li> <!--Estudiantes fin -->
        <li id="menu_Docentes" class="treeview"> <!--Docentes Estudiantes-->
          <a href="#">
            <i class="fa fa-male"></i>
            <span>Docentes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> Agregar</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> Mostrar</a></li>
          </ul>
        </li> <!--Docentes fin -->
        <li id="menu_Asignaturas" class="treeview"> <!--Asignaturas inicio -->
          <a href="#">
            <i class="fa fa-book"></i> <span>Asignaturas</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
              <small class="label pull-right bg-green">Asigna</small>
              
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#" data-toggle="modal" data-target="#modal_Materia" id="m"><i class="fa fa-circle-o text-aqua" ></i> Agregar </a></li>
            <li><a href="#" data-toggle="modal" data-target="#asignar_asignatura" id="asignar-ma"><i class="fa fa-circle-o text-aqua"></i> Asignar</a></li>
            <li><a href="<?php base_url() ?>asignaturas"  method="GET"><i class="fa fa-circle-o text-aqua"></i> Mostrar</a></li>
          </ul>
        </li> <!--Asignaturas fin -->
        <li id="menu_Reportes" class="treeview"> <!--Reportes inicio -->
          <a href="#">
            <i class="fa   fa-bar-chart"></i> <span> Reportes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> Reporte 1</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> Reporte 2</a></li>
          </ul>
        </li> <!--Reportes fin -->
        <li class="treeview " id="menu_Administra"> <!--Administra inicio -->
          <a href="#">
            <i  class="fa fa-cogs"></i> <span>Administra</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              <small class="label pull-right bg-red"></small>
            </span>
          </a>
          <ul class="treeview-menu"> 
            <li class="treeview">
            <a href="#"><i class="fa fa-circle-o text-aqua"></i> Grados<!--inicio del grados --->  
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="#" data-toggle="modal" data-target="#modal_Grado" id="m">
                  <i class="fa fa-circle-o text-yellow" ></i> Agregar </a>
                </li>
                <li class="treeview">
                  <li><a href="<?php base_url() ?>grado"  method="GET"><i class="fa fa-circle-o text-yellow"></i> Mostrar</a></li>
                </li>
              </ul> <!--final del grados ---> 
              <a href="#"><i class="fa fa-circle-o text-aqua"></i> Grupos<!--inicio del grupos --->  
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="#" data-toggle="modal" data-target="#modal_Grupo" id="m">
                  <i class="fa fa-circle-o text-yellow" ></i> Agregar </a>
                </li>
                <li class="treeview">
                  <li><a href="<?php base_url() ?>grupos"  method="GET"><i class="fa fa-circle-o text-yellow"></i> Mostrar</a></li>
                </li>
              </ul> <!--final del grados --->   
              <a href="#"><i class="fa fa-circle-o text-aqua"></i> Ofertas<!--inicio del ofertas --->  
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>                
                  <small class="label pull-right bg-green">Nueva</small>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#" data-toggle="modal" data-target="#" id="">
                  <i class="fa fa-circle-o text-yellow" ></i> Agregar </a>
                </li>
                <li class="treeview">
                    <li><a href="<?php base_url() ?>ofertas" method="GET"><i class="fa fa-circle-o text-yellow"></i> Mostrar</a></li>
         
                    
                </li>
              </ul> <!--final del ofertas ---> 
              <a href="#"><i class="fa fa-circle-o text-aqua"></i> Oficios <!--inicio del oficios --->  
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="#" data-toggle="modal" data-target="#modal_Oficio" id="m">
                    <i class="fa fa-circle-o text-yellow" ></i> Agregar </a>
                  </li>
                  <li class="treeview">
                    <li><a href="<?php base_url() ?>oficios"  method="GET"><i class="fa fa-circle-o text-yellow"></i> Mostrar</a></li>
                  </li>
              </ul> <!--final del oficios --->           
              <a href="#"><i class="fa fa-circle-o text-aqua"></i> Parentescos<!--inicio del parentesco --->  
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#" data-toggle="modal" data-target="#modal_Parentesco" id="m">
                  <i class="fa fa-circle-o text-yellow" ></i> Agregar </a>
                </li>
                <li class="treeview">

                      <li><a href="<?php base_url() ?>parentescos"  method="GET"><i class="fa fa-circle-o text-yellow"></i> Mostrar</a></li>
                </li>
              </ul> <!--final del parentescos --->  
                  
              <a href="#"><i class="fa fa-circle-o text-aqua"></i> Secciones<!--inicio del secciones --->  
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="#" data-toggle="modal" data-target="#modal_Seccion" id="m">
                  <i class="fa fa-circle-o text-yellow" ></i> Agregar </a>
                </li>
                <li class="treeview">
                  <li><a href="<?php base_url() ?>secciones"  method="GET"><i class="fa fa-circle-o text-yellow"></i> Mostrar</a></li>
                </li>
              </ul> <!--final del secciones --->  
              <a href="#"><i class="fa fa-circle-o text-aqua"></i> Turnos<!--inicio del turnos --->  
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="#" data-toggle="modal" data-target="#modal_Turno" id="m">
                  <i class="fa fa-circle-o text-yellow" ></i> Agregar </a>
                </li>
                <li class="treeview">
                  <li><a href="<?php base_url() ?>turnos"  method="GET"><i class="fa fa-circle-o text-yellow"></i> Mostrar</a></li>
                </li>
              </ul> <!--final del turnos --->       
            </li>
          </ul>
       </li>
    </section>
    <!-- /.sidebar -->
  </aside>