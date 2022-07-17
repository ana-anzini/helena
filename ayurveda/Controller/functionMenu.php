<?php
//Monta o menu do sistema
function montaMenu($navegacao, $subMenu){
    $menu = '';
    $menuPainel = '';
    $subPainelAdmin = '';
    $menuPaciente = '';
    $menuCalendario = '';
    $linkPaciente = 'collapsed';
    $areaPaciente = 'false';
    $areaCalendario = 'false';
    $linkCalendario = 'collapsed';
    $subPaciente = '';
    $subConsulta = '';
    $showPaciente = '';

    switch ($navegacao) {
        case 'pacientes':
            $menuPaciente = 'active';
            $linkPaciente = '';
            $areaPaciente = 'true';
            $showPaciente = 'show';
            break;

        case 'calendario':
            $menuCalendario = 'active';
            $linkCalendario = '';
            $areaCalendario = 'true';
            $showCalendario = 'show';
        
        default:
            # code...
            break;
    }

    switch ($subMenu) {
        case 'pacientes':
            $subPaciente = 'active';
            break;

        case 'consultas':
            $subConsulta = 'active';
            break;

        case 'calendario':
            $subCalendario = 'active';
            break;
        
        default:
            # code...
            break;
    }

    $menu = '<hr class="sidebar-divider">
                <div class="sidebar-heading">
                    Pacientes
                </div>
                <li class="nav-item '.$menuPaciente.'">
                    <a class="nav-link '.$linkPaciente.'" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="'.$areaPaciente.'" aria-controls="collapseTwo">
                        <i class="fa-solid fa-file"></i>
                        <span>Pacientes</span>
                    </a>
                    <div id="collapseTwo" class="collapse '.$showPaciente.'" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item '.$subPaciente.'" href="pacientes.php">Pacientes</a>
                            <a class="collapse-item '.$subConsulta.'" href="consultas-pendentes.php">Consultas pelo site</a>
                        </div>
                    </div>
                </li>
                <hr class="sidebar-divider">
                <div class="sidebar-heading">
                    Calendário
                </div>
                <li class="nav-item '.$menuCalendario.'">
                    <a class="nav-link '.$linkCalendario.'" href="#" data-toggle="collapse" data-target="#collapsePages"
                        aria-expanded="'.$areaCalendario.'" aria-controls="collapsePages">
                        <i class="fa-solid fa-calendar-days"></i>
                        <span>Calendário</span>
                    </a>
                    <div id="collapsePages" class="collapse '.$showCalendario.'" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item '.$subCalendario.'" href="calendario.php">Calendário</a>
                        </div>
                    </div>
                </li>
                <hr class="sidebar-divider d-none d-md-block">
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>';
        
    return $menu;
}

?>