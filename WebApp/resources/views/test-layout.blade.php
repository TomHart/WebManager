@extends('layouts.dashboard')
@section('content')
    @include('components/title-section', ['category' => 'Management', 'section' => 'Characters'])
    @include('components/hero-bar', ['title' => 'Characters'])
    
    
    
      <section class="section main-section">
        <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">
          @include('components/card', ['title' => 'Characters', 'content' => '123', 'icon' => 'account-multiple'])
        </div>
    
        <div class="card mb-6">
          <header class="card-header">
            <p class="card-header-title">
              <span class="icon"><i class="mdi mdi-finance"></i></span>
              Performance
            </p>
            <a href="#" class="card-header-icon">
              <span class="icon"><i class="mdi mdi-reload"></i></span>
            </a>
          </header>
          <div class="card-content">
            <div class="chart-area">
              <div class="h-full">
                <div class="chartjs-size-monitor">
                  <div class="chartjs-size-monitor-expand">
                    <div></div>
                  </div>
                  <div class="chartjs-size-monitor-shrink">
                    <div></div>
                  </div>
                </div>
                <canvas id="big-line-chart" width="2992" height="1000" class="chartjs-render-monitor block" style="height: 400px; width: 1197px;"></canvas>
              </div>
            </div>
          </div>
        </div>
    
        <div class="notification blue">
          <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
            <div>
              <span class="icon"><i class="mdi mdi-buffer"></i></span>
              <b>Responsive table</b>
            </div>
            <button type="button" class="button small textual --jb-notification-dismiss">Dismiss</button>
          </div>
        </div>
    
        <div class="card has-table">
          <header class="card-header">
            <p class="card-header-title">
              <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
              Clients
            </p>
            <a href="#" class="card-header-icon">
              <span class="icon"><i class="mdi mdi-reload"></i></span>
            </a>
          </header>
          <div class="card-content">
            <table>
              <thead>
              <tr>
                <th></th>
                <th>Name</th>
                <th>Company</th>
                <th>City</th>
                <th>Progress</th>
                <th>Created</th>
                <th></th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td class="image-cell">
                  <div class="image">
                    <img src="https://therichpost.com/wp-content/uploads/2021/03/avatar7.png" class="rounded-full">
                  </div>
                </td>
                <td data-label="Name">Rebecca Bauch</td>
                <td data-label="Company">Daugherty-Daniel</td>
                <td data-label="City">South Cory</td>
                <td data-label="Progress" class="progress-cell">
                  <progress max="100" value="79">79</progress>
                </td>
                <td data-label="Created">
                  <small class="text-gray-500" title="Oct 25, 2021">Oct 25, 2021</small>
                </td>
                <td class="actions-cell">
                  <div class="buttons right nowrap">
                    <button class="button small green --jb-modal"  data-target="sample-modal-2" type="button">
                      <span class="icon"><i class="mdi mdi-eye"></i></span>
                    </button>
                    <button class="button small red --jb-modal" data-target="sample-modal" type="button">
                      <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                    </button>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="image-cell">
                  <div class="image">
                    <img src="https://therichpost.com/wp-content/uploads/2021/03/avatar7.png" class="rounded-full">
                  </div>
                </td>
                <td data-label="Name">Felicita Yundt</td>
                <td data-label="Company">Johns-Weissnat</td>
                <td data-label="City">East Ariel</td>
                <td data-label="Progress" class="progress-cell">
                  <progress max="100" value="67">67</progress>
                </td>
                <td data-label="Created">
                  <small class="text-gray-500" title="Jan 8, 2021">Jan 8, 2021</small>
                </td>
                <td class="actions-cell">
                  <div class="buttons right nowrap">
                    <button class="button small green --jb-modal"  data-target="sample-modal-2" type="button">
                      <span class="icon"><i class="mdi mdi-eye"></i></span>
                    </button>
                    <button class="button small red --jb-modal" data-target="sample-modal" type="button">
                      <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                    </button>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="image-cell">
                  <div class="image">
                    <img src="https://therichpost.com/wp-content/uploads/2021/03/avatar7.png" class="rounded-full">
                  </div>
                </td>
                <td data-label="Name">Mr. Larry Satterfield V</td>
                <td data-label="Company">Hyatt Ltd</td>
                <td data-label="City">Windlerburgh</td>
                <td data-label="Progress" class="progress-cell">
                  <progress max="100" value="16">16</progress>
                </td>
                <td data-label="Created">
                  <small class="text-gray-500" title="Dec 18, 2021">Dec 18, 2021</small>
                </td>
                <td class="actions-cell">
                  <div class="buttons right nowrap">
                    <button class="button small green --jb-modal"  data-target="sample-modal-2" type="button">
                      <span class="icon"><i class="mdi mdi-eye"></i></span>
                    </button>
                    <button class="button small red --jb-modal" data-target="sample-modal" type="button">
                      <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                    </button>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="image-cell">
                  <div class="image">
                    <img src="https://therichpost.com/wp-content/uploads/2021/03/avatar7.png" class="rounded-full">
                  </div>
                </td>
                <td data-label="Name">Mr. Broderick Kub</td>
                <td data-label="Company">Kshlerin, Bauch and Ernser</td>
                <td data-label="City">New Kirstenport</td>
                <td data-label="Progress" class="progress-cell">
                  <progress max="100" value="71">71</progress>
                </td>
                <td data-label="Created">
                  <small class="text-gray-500" title="Sep 13, 2021">Sep 13, 2021</small>
                </td>
                <td class="actions-cell">
                  <div class="buttons right nowrap">
                    <button class="button small green --jb-modal"  data-target="sample-modal-2" type="button">
                      <span class="icon"><i class="mdi mdi-eye"></i></span>
                    </button>
                    <button class="button small red --jb-modal" data-target="sample-modal" type="button">
                      <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                    </button>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="image-cell">
                  <div class="image">
                    <img src="https://therichpost.com/wp-content/uploads/2021/03/avatar7.png" class="rounded-full">
                  </div>
                </td>
                <td data-label="Name">Barry Weber</td>
                <td data-label="Company">Schulist, Mosciski and Heidenreich</td>
                <td data-label="City">East Violettestad</td>
                <td data-label="Progress" class="progress-cell">
                  <progress max="100" value="80">80</progress>
                </td>
                <td data-label="Created">
                  <small class="text-gray-500" title="Jul 24, 2021">Jul 24, 2021</small>
                </td>
                <td class="actions-cell">
                  <div class="buttons right nowrap">
                    <button class="button small green --jb-modal"  data-target="sample-modal-2" type="button">
                      <span class="icon"><i class="mdi mdi-eye"></i></span>
                    </button>
                    <button class="button small red --jb-modal" data-target="sample-modal" type="button">
                      <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                    </button>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="image-cell">
                  <div class="image">
                    <img src="https://therichpost.com/wp-content/uploads/2021/03/avatar7.png" class="rounded-full">
                  </div>
                </td>
                <td data-label="Name">Bert Kautzer MD</td>
                <td data-label="Company">Gerhold and Sons</td>
                <td data-label="City">Mayeport</td>
                <td data-label="Progress" class="progress-cell">
                  <progress max="100" value="62">62</progress>
                </td>
                <td data-label="Created">
                  <small class="text-gray-500" title="Mar 30, 2021">Mar 30, 2021</small>
                </td>
                <td class="actions-cell">
                  <div class="buttons right nowrap">
                    <button class="button small green --jb-modal"  data-target="sample-modal-2" type="button">
                      <span class="icon"><i class="mdi mdi-eye"></i></span>
                    </button>
                    <button class="button small red --jb-modal" data-target="sample-modal" type="button">
                      <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                    </button>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="image-cell">
                  <div class="image">
                    <img src="https://therichpost.com/wp-content/uploads/2021/03/avatar7.png" class="rounded-full">
                  </div>
                </td>
                <td data-label="Name">Lonzo Steuber</td>
                <td data-label="Company">Skiles Ltd</td>
                <td data-label="City">Marilouville</td>
                <td data-label="Progress" class="progress-cell">
                  <progress max="100" value="17">17</progress>
                </td>
                <td data-label="Created">
                  <small class="text-gray-500" title="Feb 12, 2021">Feb 12, 2021</small>
                </td>
                <td class="actions-cell">
                  <div class="buttons right nowrap">
                    <button class="button small green --jb-modal"  data-target="sample-modal-2" type="button">
                      <span class="icon"><i class="mdi mdi-eye"></i></span>
                    </button>
                    <button class="button small red --jb-modal" data-target="sample-modal" type="button">
                      <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                    </button>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="image-cell">
                  <div class="image">
                    <img src="https://therichpost.com/wp-content/uploads/2021/03/avatar7.png" class="rounded-full">
                  </div>
                </td>
                <td data-label="Name">Jonathon Hahn</td>
                <td data-label="Company">Flatley Ltd</td>
                <td data-label="City">Billiemouth</td>
                <td data-label="Progress" class="progress-cell">
                  <progress max="100" value="74">74</progress>
                </td>
                <td data-label="Created">
                  <small class="text-gray-500" title="Dec 30, 2021">Dec 30, 2021</small>
                </td>
                <td class="actions-cell">
                  <div class="buttons right nowrap">
                    <button class="button small green --jb-modal"  data-target="sample-modal-2" type="button">
                      <span class="icon"><i class="mdi mdi-eye"></i></span>
                    </button>
                    <button class="button small red --jb-modal" data-target="sample-modal" type="button">
                      <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                    </button>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="image-cell">
                  <div class="image">
                    <img src="https://therichpost.com/wp-content/uploads/2021/03/avatar7.png" class="rounded-full">
                  </div>
                </td>
                <td data-label="Name">Ryley Wuckert</td>
                <td data-label="Company">Heller-Little</td>
                <td data-label="City">Emeraldtown</td>
                <td data-label="Progress" class="progress-cell">
                  <progress max="100" value="54">54</progress>
                </td>
                <td data-label="Created">
                  <small class="text-gray-500" title="Jun 28, 2021">Jun 28, 2021</small>
                </td>
                <td class="actions-cell">
                  <div class="buttons right nowrap">
                    <button class="button small green --jb-modal"  data-target="sample-modal-2" type="button">
                      <span class="icon"><i class="mdi mdi-eye"></i></span>
                    </button>
                    <button class="button small red --jb-modal" data-target="sample-modal" type="button">
                      <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                    </button>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="image-cell">
                  <div class="image">
                    <img src="https://therichpost.com/wp-content/uploads/2021/03/avatar7.png" class="rounded-full">
                  </div>
                </td>
                <td data-label="Name">Sienna Hayes</td>
                <td data-label="Company">Conn, Jerde and Douglas</td>
                <td data-label="City">Jonathanfort</td>
                <td data-label="Progress" class="progress-cell">
                  <progress max="100" value="55">55</progress>
                </td>
                <td data-label="Created">
                  <small class="text-gray-500" title="Mar 7, 2021">Mar 7, 2021</small>
                </td>
                <td class="actions-cell">
                  <div class="buttons right nowrap">
                    <button class="button small green --jb-modal"  data-target="sample-modal-2" type="button">
                      <span class="icon"><i class="mdi mdi-eye"></i></span>
                    </button>
                    <button class="button small red --jb-modal" data-target="sample-modal" type="button">
                      <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                    </button>
                  </div>
                </td>
              </tr>
              </tbody>
            </table>
            <div class="table-pagination">
              <div class="flex items-center justify-between">
                <div class="buttons">
                  <button type="button" class="button active">1</button>
                  <button type="button" class="button">2</button>
                  <button type="button" class="button">3</button>
                </div>
                <small>Page 1 of 3</small>
              </div>
            </div>
          </div>
        </div>
      </section>
    
    <footer class="footer">
      <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
        <div class="flex items-center justify-start space-x-3">
          <div>
            © 2021, therichpost.com
          </div>
          <div>
            <p>Distributed By: <a href="https://therichpost.com/" target="_blank">Therichpost</a></p>
          </div>
          <a href="https://therichpost.com" style="height: 20px">
            <img src="https://img.shields.io/github/v/release/justboil/admin-one-tailwind?color=%23999">
          </a>
        </div>
        
      </div>
    </footer>
    
    <div id="sample-modal" class="modal">
      <div class="modal-background --jb-modal-close"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Sample modal</p>
        </header>
        <section class="modal-card-body">
          <p>Lorem ipsum dolor sit amet <b>adipiscing elit</b></p>
          <p>This is sample modal</p>
        </section>
        <footer class="modal-card-foot">
          <button class="button --jb-modal-close">Cancel</button>
          <button class="button red --jb-modal-close">Confirm</button>
        </footer>
      </div>
    </div>
    <div id="sample-modal-2" class="modal">
      <div class="modal-background --jb-modal-close"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Sample modal</p>
        </header>
        <section class="modal-card-body">
          <p>Lorem ipsum dolor sit amet <b>adipiscing elit</b></p>
          <p>This is sample modal</p>
        </section>
        <footer class="modal-card-foot">
          <button class="button --jb-modal-close">Cancel</button>
          <button class="button blue --jb-modal-close">Confirm</button>
        </footer>
      </div>
    </div>
    </div>
@stop