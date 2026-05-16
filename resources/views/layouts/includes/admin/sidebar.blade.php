<aside id="top-bar-sidebar" class="fixed top-0 left-0 z-40 w-64 h-full transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
   <style>
      .sidebar-link {
         transition: all 0.2s ease;
         border: 1px solid transparent;
      }
      .sidebar-link:hover {
         background-color: rgba(0, 0, 0, 0.03) !important;
         color: #dc2626 !important; /* Rojo al pasar el mouse */
         border-color: #000000 !important; /* Contorno negro */
      }
      .sidebar-link:hover svg {
         color: #dc2626 !important;
      }
      /* Estilo para la pestaña activa */
      .sidebar-active {
         border-color: #000000 !important;
         background-color: rgba(0, 0, 0, 0.02);
         font-weight: 600;
      }
   </style>
   <div class="h-full px-3 py-4 overflow-y-auto bg-white border-e border-gray-200 mt-14">
      <ul class="space-y-2 font-medium">
         <li>
            <a href="{{ route('admin.dashboard') }}" 
               class="sidebar-link flex items-center px-2 py-1.5 text-body rounded-base group {{ request()->routeIs('admin.dashboard') ? 'sidebar-active' : '' }}">
               <svg class="w-5 h-5 transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6.025A7.5 7.5 0 1 0 17.975 14H10V6.025Z"/><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 3c-.169 0-.334.014-.5.025V11h7.975c.011-.166.025-.331.025-.5A7.5 7.5 0 0 0 13.5 3Z"/></svg>
               <span class="ms-3">Dashboard</span>
            </a>
         </li>

         <!-- Sección GESTIÓN -->
         <li class="pt-4 pb-2">
            <span class="px-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">GESTIÓN</span>
         </li>

         <li>
            <a href="{{ route('admin.roles.index') }}" 
               class="sidebar-link flex items-center px-2 py-1.5 text-body rounded-base group {{ request()->routeIs('admin.roles.*') ? 'sidebar-active' : '' }}">
               <i class="fa-solid fa-user-shield w-5 text-center transition duration-75"></i>
               <span class="flex-1 ms-3 whitespace-nowrap">Roles</span>
            </a>
         </li>
         <li>
            <a href="{{ route('admin.users.index') }}" 
               class="sidebar-link flex items-center px-2 py-1.5 text-body rounded-base group {{ request()->routeIs('admin.users.*') ? 'sidebar-active' : '' }}">
               <i class="fa-solid fa-users w-5 text-center transition duration-75"></i>
               <span class="flex-1 ms-3 whitespace-nowrap">Usuarios</span>
            </a>
         </li>
         <li>
            <a href="{{ route('admin.printing.index') }}" 
               class="sidebar-link flex items-center px-2 py-1.5 text-body rounded-base group {{ request()->routeIs('admin.printing.*') ? 'sidebar-active' : '' }}">
               <i class="fa-solid fa-print w-5 text-center transition duration-75"></i>
               <span class="flex-1 ms-3 whitespace-nowrap">Impresión</span>
            </a>
         </li>
         <li>
            <a href="{{ route('admin.delivery.index') }}" 
               class="sidebar-link flex items-center px-2 py-1.5 text-body rounded-base group {{ request()->routeIs('admin.delivery.*') ? 'sidebar-active' : '' }}">
               <i class="fa-solid fa-truck-fast w-5 text-center transition duration-75"></i>
               <span class="flex-1 ms-3 whitespace-nowrap">Envíos</span>
            </a>
         </li>
         <li>
            <a href="{{ route('admin.inventory.index') }}" 
               class="sidebar-link flex items-center px-2 py-1.5 text-body rounded-base group {{ request()->routeIs('admin.inventory.*') ? 'sidebar-active' : '' }}">
               <i class="fa-solid fa-boxes-stacked w-5 text-center transition duration-75"></i>
               <span class="flex-1 ms-3 whitespace-nowrap">Inventario</span>
            </a>
         </li>
      </ul>
   </div>
</aside>
